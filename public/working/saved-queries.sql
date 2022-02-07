SELECT 
(SELECT sp.class FROM student_profile AS sp WHERE sp.studentid = sg.`studentid`) AS studentclass,
(SELECT sp.class FROM student_profile AS sp WHERE sp.studentid = sg.`studentid`) AS studentclass,
'' AS assessmenttype,
'' AS assessmentgrade,
(SELECT sp.class FROM student_profile AS sp WHERE sp.studentid = sg.`studentid`) AS studentclass,
(SELECT sessionid FROM session_setup WHERE flag=1) AS schoolsession,
(SELECT termid FROM term_setup WHERE flag=1) AS schoolterm,

* FROM 

`student_profile` AS sg


===============================


SELECT 
(SELECT sp.class FROM student_profile AS sp WHERE sp.studentid = sg.`studentid`) AS studentclass,
(SELECT sp.class FROM student_profile AS sp WHERE sp.studentid = sg.`studentid`) AS studentclass,
coalesce((SELECT grd.assessmenttype FROM setup_gradebook AS grd WHERE grd.studentid = sg.`studentid`), '') AS assessmenttype,
coalesce((SELECT grd.assessmentgrade FROM setup_gradebook AS grd WHERE grd.studentid = sg.`studentid`), '') AS assessmentgrade,
(SELECT sessionid FROM session_setup WHERE activeflag=1) AS schoolsession,
(SELECT termid FROM term_setup WHERE activeflag=1) AS schoolterm

FROM 

`student_profile` AS sg


=============


SELECT 
sg.studentid AS studentid,
(SELECT sp.class FROM student_profile AS sp WHERE sp.studentid = sg.`studentid`) AS studentclass,
(SELECT sp.class FROM student_profile AS sp WHERE sp.studentid = sg.`studentid`) AS studentclass,
coalesce((SELECT grd.assessmenttype FROM setup_gradebook AS grd WHERE grd.studentid = sg.`studentid`), '') AS assessmenttype,
coalesce((SELECT grd.assessmentgrade FROM setup_gradebook AS grd WHERE grd.studentid = sg.`studentid`), '') AS assessmentgrade,
(SELECT sessionid FROM session_setup WHERE activeflag=1) AS schoolsession,
(SELECT termid FROM term_setup WHERE activeflag=1) AS schoolterm

FROM 

`student_profile` AS sg


============================


SELECT 
sg.studentid AS studentid,
(SELECT sp.class FROM student_profile AS sp WHERE sp.studentid = sg.`studentid`) AS studentclass,
coalesce((SELECT grd.studentsubject FROM setup_gradebook AS grd WHERE grd.studentid = sg.`studentid`), '') AS studentsubject,
coalesce((SELECT grd.assessmenttype FROM setup_gradebook AS grd WHERE grd.studentid = sg.`studentid`), '') AS assessmenttype,
coalesce((SELECT grd.assessmentgrade FROM setup_gradebook AS grd WHERE grd.studentid = sg.`studentid`), '') AS assessmentgrade,
(SELECT sessionid FROM session_setup WHERE activeflag=1) AS schoolsession,
(SELECT termid FROM term_setup WHERE activeflag=1) AS schoolterm

FROM 

`student_profile` AS sg


======================


CREATE OR REPLACE VIEW view_gradebook AS

SELECT 
sg.studentid AS studentid,
(SELECT sp.class FROM student_profile AS sp WHERE sp.studentid = sg.`studentid`) AS studentclass,
coalesce((SELECT grd.studentsubject FROM setup_gradebook AS grd WHERE grd.studentid = sg.`studentid`), '') AS studentsubject,
coalesce((SELECT grd.assessmenttype FROM setup_gradebook AS grd WHERE grd.studentid = sg.`studentid`), '') AS assessmenttype,
coalesce((SELECT grd.assessmentgrade FROM setup_gradebook AS grd WHERE grd.studentid = sg.`studentid`), '') AS assessmentgrade,
(SELECT sessionid FROM session_setup WHERE activeflag=1) AS schoolsession,
(SELECT termid FROM term_setup WHERE activeflag=1) AS schoolterm

FROM 

`student_profile` AS sg