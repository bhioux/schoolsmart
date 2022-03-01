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
sg.regno AS regno,
CONCAT(surname, ' ', othernames) AS fullname,
(SELECT sp.class FROM student_profile AS sp WHERE sp.studentid = sg.`studentid`) AS studentclass,
coalesce((SELECT grd.studentsubject FROM setup_gradebook AS grd WHERE grd.studentid = sg.`studentid`), '') AS studentsubject,
coalesce((SELECT grd.assessmenttype FROM setup_gradebook AS grd WHERE grd.studentid = sg.`studentid`), '') AS assessmenttype,

coalesce((SELECT grd.assessmentgrade FROM setup_gradebook AS grd WHERE grd.studentid = sg.`studentid`), '') AS assessmentgrade,


(SELECT sessionid FROM session_setup WHERE activeflag=1) AS schoolsession,
(SELECT termid FROM term_setup WHERE activeflag=1) AS schoolterm

FROM 

`student_profile` AS sg


======================

-- `scoresheetid`, `studentno`, `subject`, `ca1`, `ca2`, `ca3`, `exam`, `termsummary`, `lasttermcum`, `cumavg`, `classavg`, `position`, `remark`, `sign`, `created_at`, `updated_at`

----------------------------------------------------

-- `gradebookid`, `studentclass`, `studentsubject`, `studentid`, `assessmenttype`, `assessmentgrade`, `session`, `term`, `created_at`, `updated_at`

---------------------


-- `subjectid`, `subjectname`, `subjectcode`, `subjectdescription`



CREATE OR REPLACE VIEW view_scoresheet AS

SELECT 
ss.studentno AS studentno,
ss.subject AS subjects,

coalesce((SELECT CONCAT(sp.surname, ' ', sp.othernames) FROM student_profile AS sp WHERE sp.regno = ss.studentno), '') AS fullname,
(SELECT class FROM student_profile AS sp WHERE sp.regno = ss.studentno) AS class,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca1 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.ca1, '') AS ca1,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca2 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.ca2, '') AS ca2,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca3 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.ca3, '') AS ca3,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.exam AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.exam, '') AS exam,

coalesce(
    (SELECT  
        SUM(
            coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca1 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), 0),
            coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca2 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), 0),
            coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca3 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), 0),
            coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.exam AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), 0)
        )
    ),  ss.termsummary, '') AS termsummary,

ss.lasttermcum AS lasttermcum,
ss.cumavg AS cumavg,
ss.classavg AS classavg,
ss.position AS position,
ss.remark AS remark,
ss.sign AS signs,

(SELECT sessionid FROM session_setup WHERE activeflag=1) AS schoolsession,
(SELECT session FROM session_setup WHERE activeflag=1) AS sessionname,

(SELECT termid FROM term_setup WHERE activeflag=1) AS schoolterm,
(SELECT term FROM term_setup WHERE activeflag=1) AS termname

FROM 

`scoresheet` AS ss

---------------------------------------------------------------------------------------

--(SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca1 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject)
----------------------------------
-- (SELECT sub.subjectname FROM setup_subjects AS sub WHERE sub.subjectcode = ss.subject) AS subjectname,
-- (SELECT sub.subjectname FROM setup_subjects AS sub WHERE sub.subjectcode = ss.subject) AS subjectname,
------------------------------
-- SUM(
--     (SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca1 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject),
--     (SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca2 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject),
--     (SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca3 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject),
--     (SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.exam AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject)

--     )



------------------------------


SELECT 
ss.studentno AS studentno,
ss.subject AS subjects,

-- (SELECT sub.subjectname FROM setup_subjects AS sub WHERE sub.subjectcode = ss.subject) AS subjectname,
(SELECT sub.subjectname FROM setup_subjects AS sub WHERE sub.subjectcode = ss.subject) AS subjectname,

coalesce((SELECT CONCAT(sp.surname, ' ', sp.othernames) FROM student_profile AS sp WHERE sp.regno = ss.studentno), '') AS fullname,
(SELECT class FROM student_profile AS sp WHERE sp.regno = ss.studentno) AS class,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca1 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.ca1, '') AS ca1

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca2 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.ca2, '') AS ca2,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca3 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.ca3, '') AS ca3,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.exam AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.exam, '') AS exam,

ss.termsummary AS termsummary,
ss.lasttermcum AS lasttermcum,
ss.cumavg AS cumavg,
ss.classavg AS classavg,
ss.position AS position,
ss.remark AS remark,
ss.sign AS signs,

(SELECT sessionid FROM session_setup WHERE activeflag=1) AS schoolsession,
(SELECT session FROM session_setup WHERE activeflag=1) AS sessionname,

(SELECT termid FROM term_setup WHERE activeflag=1) AS schoolterm,
(SELECT term FROM term_setup WHERE activeflag=1) AS termname

FROM 

`scoresheet` AS ss;


------------------------------------



SELECT 
ss.studentno AS studentno,
ss.subject AS subjects,

-- (SELECT sub.subjectname FROM setup_subjects AS sub WHERE sub.subjectcode = ss.subject) AS subjectname,
(SELECT sub.subjectname FROM setup_subjects AS sub WHERE sub.subjectcode = ss.subject) AS subjectname,

coalesce((SELECT CONCAT(sp.surname, ' ', sp.othernames) FROM student_profile AS sp WHERE sp.regno = ss.studentno), '') AS fullname,
(SELECT class FROM student_profile AS sp WHERE sp.regno = ss.studentno) AS class,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca1 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.ca1, '') AS ca1,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca2 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.ca2, '') AS ca2,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca3 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.ca3, '') AS ca3,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.exam AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.exam, '') AS exam,

coalesce(
    (SELECT 
            (
            coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca1 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), 0) +
            coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca2 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), 0) +
            coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca3 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), 0) +
            coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.exam AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), 0)
       )
    ),  ss.termsummary, '') AS termsummary,
    
ss.lasttermcum AS lasttermcum,
ss.cumavg AS cumavg,
ss.classavg AS classavg,
ss.position AS position,
ss.remark AS remark,
ss.sign AS signs,

(SELECT sessionid FROM session_setup WHERE activeflag=1) AS schoolsession,
(SELECT session FROM session_setup WHERE activeflag=1) AS sessionname,

(SELECT termid FROM term_setup WHERE activeflag=1) AS schoolterm,
(SELECT term FROM term_setup WHERE activeflag=1) AS termname

FROM 

`scoresheet` AS ss;


----------------------------------------------------
----------------------------------------------------


SELECT 
ss.studentno AS studentno,
ss.subject AS subjects,

-- (SELECT sub.subjectname FROM setup_subjects AS sub WHERE sub.subjectcode = ss.subject) AS subjectname,
(SELECT sub.subjectname FROM setup_subjects AS sub WHERE sub.subjectcode = ss.subject) AS subjectname,

coalesce((SELECT CONCAT(sp.surname, ' ', sp.othernames) FROM student_profile AS sp WHERE sp.regno = ss.studentno), '') AS fullname,
(SELECT class FROM student_profile AS sp WHERE sp.regno = ss.studentno) AS class,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca1 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.ca1, '') AS ca1,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca2 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.ca2, '') AS ca2,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca3 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.ca3, '') AS ca3,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.exam AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.exam, '') AS exam,

coalesce(
            (
            (SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca1 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject) +
            (SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca2 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject) +
            (SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca3 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject) +
           (SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.exam AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject)

    ),  ss.termsummary, '') AS termsummary,
    
ss.lasttermcum AS lasttermcum,
ss.cumavg AS cumavg,
ss.classavg AS classavg,
ss.position AS position,
ss.remark AS remark,
ss.sign AS signs,

(SELECT sessionid FROM session_setup WHERE activeflag=1) AS schoolsession,
(SELECT session FROM session_setup WHERE activeflag=1) AS sessionname,

(SELECT termid FROM term_setup WHERE activeflag=1) AS schoolterm,
(SELECT term FROM term_setup WHERE activeflag=1) AS termname

FROM 

`scoresheet` AS ss;







------------

-------------

--------------------------------------------------------------


SELECT 
ss.studentno AS studentno,
ss.subject AS subjects,

-- (SELECT sub.subjectname FROM setup_subjects AS sub WHERE sub.subjectcode = ss.subject) AS subjectname,
(SELECT sub.subjectname FROM setup_subjects AS sub WHERE sub.subjectcode = ss.subject) AS subjectname,

coalesce((SELECT CONCAT(sp.surname, ' ', sp.othernames) FROM student_profile AS sp WHERE sp.regno = ss.studentno), '') AS fullname,
(SELECT class FROM student_profile AS sp WHERE sp.regno = ss.studentno) AS class,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca1 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.ca1, '') AS ca1,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca2 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.ca2, '') AS ca2,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca3 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.ca3, '') AS ca3,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.exam AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), ss.exam, '') AS exam,

coalesce(
            (
                coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca1 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), 0) +
                coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca2 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), 0) +
                coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca3 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), 0) +
                coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.exam AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), 0)
             ),      ss.termsummary, ''
        ) AS termsummary,
    
ss.lasttermcum AS lasttermcum,
ss.cumavg AS cumavg,
ss.classavg AS classavg,
ss.position AS position,
ss.remark AS remark,
ss.sign AS signs,

(SELECT sessionid FROM session_setup WHERE activeflag=1) AS schoolsession,
(SELECT session FROM session_setup WHERE activeflag=1) AS sessionname,

(SELECT termid FROM term_setup WHERE activeflag=1) AS schoolterm,
(SELECT term FROM term_setup WHERE activeflag=1) AS termname,


(SELECT 
    coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca1 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), 0) +
    coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca2 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), 0) +
    coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca3 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), 0) +
    coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.exam AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject), 0)
)  AS summary

FROM 

`scoresheet` AS ss;



------------

-------------

--------------------------------------------------------------

CREATE OR REPLACE VIEW view_scoresheet AS
SELECT 
ss.studentno AS studentno,
ss.subject AS subjects,

(SELECT sub.subjectname FROM setup_subjects AS sub WHERE sub.subjectcode = ss.subject) AS subjectname,

coalesce((SELECT studentid FROM student_profile AS sp WHERE sp.regno = ss.studentno), NULL) AS studentid,

coalesce((SELECT CONCAT(sp.surname, ' ', sp.othernames) FROM student_profile AS sp WHERE sp.regno = ss.studentno), '') AS fullname,
(SELECT class FROM student_profile AS sp WHERE sp.regno = ss.studentno) AS class,


(SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca1' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)) AS ca11,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca1' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.ca1, '') AS ca1,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca2' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.ca2, '') AS ca2,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca3' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.ca3, '') AS ca3,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'exam' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.exam, '') AS exam,

coalesce(
           NULLIF (
                coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca1' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), 0) +
                coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca2' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), 0) +
                coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca3' AND ss.subject =  sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), 0) +
                coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'exam' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), 0), 0
             ),      ss.termsummary, NULL
        ) AS termsummary,
    
ss.lasttermcum AS lasttermcum,
ss.cumavg AS cumavg,



(

(
coalesce(
    NULLIF (
        coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca1' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), 0) +
        coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca2' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), 0) +
        coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca3' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), 0) +
        coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'exam' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), 0), 0
        ),      ss.termsummary, ''
)

+

ss.lasttermcum
)
/2

)
AS cumavg2,

ss.classavg AS classavg,
ss.position AS position,
ss.remark AS remark,
ss.sign AS signs,

(SELECT sessionid FROM session_setup WHERE activeflag=1) AS schoolsession,
(SELECT session FROM session_setup WHERE activeflag=1) AS sessionname,

(SELECT termid FROM term_setup WHERE activeflag=1) AS schoolterm,
(SELECT term FROM term_setup WHERE activeflag=1) AS termname,


(SELECT 
    coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca1' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), 0) +
    coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca2' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), 0) +
    coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca3' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), 0) +
    coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'exam' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), 0)
)  AS summary

FROM 

`scoresheet` AS ss WHERE term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND session = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1);




---------------------------------

-----------------------------------

---------------------------------------


SELECT 
ss.studentno AS studentno,
ss.subject AS subjects,

-- (SELECT sub.subjectname FROM setup_subjects AS sub WHERE sub.subjectcode = ss.subject) AS subjectname,
(SELECT sub.subjectname FROM setup_subjects AS sub WHERE sub.subjectcode = ss.subject) AS subjectname,

coalesce((SELECT CONCAT(sp.surname, ' ', sp.othernames) FROM student_profile AS sp WHERE sp.regno = ss.studentno), '') AS fullname,
(SELECT class FROM student_profile AS sp WHERE sp.regno = ss.studentno) AS class,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca1 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject AND sg.studentid = ss.studentno), ss.ca1, '') AS ca1,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca2 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject AND sg.studentid = ss.studentno), ss.ca2, '') AS ca2,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.ca3 AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject AND sg.studentid = ss.studentno), ss.ca3, '') AS ca3,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = ss.exam AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject AND sg.studentid = ss.studentno), ss.exam, '') AS exam,

coalesce(
            ( 
                coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = 'ca1' AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject AND sg.studentid = ss.studentno), 0) +
                coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = 'ca2' AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject AND sg.studentid = ss.studentno), 0) +
                coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = 'ca3' AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject AND sg.studentid = ss.studentno), 0) +
                coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = 'exam' AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject AND sg.studentid = ss.studentno), 0)
             ),      ss.termsummary, ''
        ) AS termsummary,
    
ss.lasttermcum AS lasttermcum,
ss.cumavg AS cumavg,
ss.classavg AS classavg,
ss.position AS position,
ss.remark AS remark,
ss.sign AS signs,

(SELECT sessionid FROM session_setup WHERE activeflag=1) AS schoolsession,
(SELECT session FROM session_setup WHERE activeflag=1) AS sessionname,

(SELECT termid FROM term_setup WHERE activeflag=1) AS schoolterm,
(SELECT term FROM term_setup WHERE activeflag=1) AS termname,


coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg, setup_subjects AS subj WHERE sg.assessmenttype = 'ca1' AND ss.subject = subj.subjectcode AND subj.subjectid = sg.studentsubject AND sg.studentid = ss.studentno), 0)  AS summary

FROM 

`scoresheet` AS ss;





===============================



-- AUTHENTICATITION VIEW QUERIES

SELECT 
TRIM(sp.`regno`) AS username,
md5(UPPER(TRIM(sp.`surname`))) AS password,
TRIM(sp.`email`) AS email
FROM `student_profile` AS sp