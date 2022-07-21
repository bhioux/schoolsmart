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
               coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca1' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.ca1, 0) +

                coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca2' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.ca2, 0) +

                coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca3' AND ss.subject =  sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.ca3, 0) +

                coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'exam' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.exam, 0), 0
             ),      ss.termsummary, 'NULL'
        ) AS termsummary,
    
ss.lasttermcum AS lasttermcum,
ss.cumavg AS cumavg,



(

(
coalesce(
    NULLIF (
            coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca1' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.ca1, 0) +

            coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca2' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.ca2, 0) +

            coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca3' AND ss.subject =  sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.ca3, 0) +

            coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'exam' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.exam, 0), 0
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
(SELECT term FROM term_setup WHERE activeflag=1) AS termname

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



-- AUTHENTICATITION VIEW QUERIES (STUDENT)

CREATE OR REPLACE VIEW userlogin AS
SELECT 
TRIM(sp.`regno`) AS username,
COALESCE((SELECT pwd FROM password_table AS pt WHERE pt.studentno = sp.regno),
    md5(UPPER(TRIM(sp.`surname`)))) AS password,
TRIM(sp.`email`) AS email,
'student' AS category
FROM `student_profile` AS sp

UNION

SELECT 
TRIM(sp.`empno`) AS username,
COALESCE((SELECT pwd FROM password_table AS pt WHERE pt.studentno = ssp.empno),
    md5(UPPER(TRIM(ssp.`surname`)))) AS password,
TRIM(ssp.`email`) AS email,
TRIM(ssp.`position`) AS category,
FROM `staff_profile` AS ssp



-- AUTHENTICATITION VIEW QUERIES (STAFF)

CREATE VIEW userlogin AS
SELECT 
TRIM(sp.`empno`) AS username,
COALESCE((SELECT pwd FROM password_table AS pt WHERE pt.studentno = sp.regno),
    md5(UPPER(TRIM(sp.`surname`)))) AS password,
TRIM(sp.`email`) AS email,
'student' AS category
FROM `staff_profile` AS sp



-- pgportal

SELECT 

p.`application_no` AS formno,
 
(SELECT CONCAT(acc.`sname`,' ', acc.`onames`) FROM `accountholder` AS acc WHERE acc.`refNum`= p.`application_no`) AS candidatename,

(SELECT dept.shortcode FROM department AS dept WHERE dept.deptid = p.progcourse) AS dept,

(SELECT sch.shortcode FROM school AS sch WHERE  sch.schoolid = p.progschool) AS school,

(SELECT acc.paytype FROM accountholder AS acc WHERE acc.refNum = p.`application_no`) AS category,

(SELECT dept.deptname FROM department AS dept WHERE dept.deptid = p.progcourse) AS department,

(SELECT co.`degree` FROM `new_courseoption` AS co, accountholder AS acc WHERE co.`programme` = acc.paytype AND acc.refNum = p.`application_no` AND co.`session` = p.`progsession`) AS degree,

MID(`progsession`,4) AS batch,

0  printstatus,

(SELECT co.`coursename` FROM `new_courseoption` AS co WHERE co.courseid = p.`progoption1`) AS programme


FROM `program` AS p WHERE p.`pgcleared`=1 AND p.`deptclear`=1


----


SELECT co.`degree` FROM `new_courseoption` AS co, accountholder AS acc, program AS p WHERE co.`programme` = acc.paytype AND acc.refNum = p.`application_no` AND co.`session` = p.`progsession`






---------------------
CREATE OR REPLACE VIEW view_summary AS

 SELECT 
 STUDENTNO, 
  coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca1' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.ca1, 0) AS CA1,
  
  
coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca2' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.ca2, 0) as CA2,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca3' AND ss.subject =  sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.ca3, 0) AS CA3,

coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'exam' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.exam, 0) AS EXAM,


 coalesce(
           NULLIF (
                coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca1' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.ca1, 0) +

                coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca2' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.ca2, 0) +

                coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'ca3' AND ss.subject =  sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.ca3, 0) +

                coalesce((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.assessmenttype = 'exam' AND ss.subject = sg.studentsubject AND sg.studentid = ss.studentno AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND ssession = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1)), ss.exam, 0), 0
             ),      ss.termsummary, 'NULL'
        ) 
        
 AS SUMMARY FROM scoresheet AS SS



 ------------------POSITION QUERY


 -- SELECT * FROM `view_scoresheet` WHERE 1

SELECT
`studentno`,
`fullname`,
-- (SELECT count(*) FROM view_scoresheet AS sh WHERE sh.`scoresheetid`< ss.scoresheetid ORDER BY sh.scoresheetid) AS position,

(SELECT count(*) FROM view_scoresheet AS sh WHERE sh.`cumavg2`< ss.cumavg2 AND term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND session = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1 AND sh.class=ss.class AND sh.subjects=ss.subjects  ORDER BY sh.`cumavg2`)) AS position,

`studentno`
FROM `view_scoresheet` AS ss ORDER BY ss.scoresheetid



-----------------


-- SELECT * FROM `view_scoresheet` WHERE 1
CREATE OR REPLACE VIEW view_position AS
SELECT
ss.`studentno`,
ss.`fullname`,
ss.`subjects`,
ss.`cumavg2`,
-- (SELECT count(*) FROM view_scoresheet AS sh WHERE sh.`scoresheetid`< ss.scoresheetid ORDER BY sh.scoresheetid) AS position,

(SELECT count(*) FROM view_scoresheet AS sh WHERE sh.`cumavg2`> ss.cumavg2 AND schoolterm = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND `schoolsession` = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1 AND sh.class=ss.class AND sh.subjects=ss.subjects  ORDER BY sh.`cumavg2`)) +1 AS position,

ss.`sessionname`,
ss.schoolsession,
ss.schoolterm
ss.`termname`
FROM `view_scoresheet` AS ss ORDER BY ss.`subjects`, `cumavg2` DESC



------------------------------
CREATE OR REPLACE VIEW view_studentprofile AS

select 
`sp`.`studentid` AS `studentid`,
`sp`.`regno` AS `regno`,
concat(`sp`.`surname`,' ',`sp`.`othernames`) AS `fullname`,
`sp`.`dob` AS `dob`,
`sp`.`class` AS `class`,
`sp`.`hometown` AS `hometown`,
`sp`.`lga` AS `lga`,
`sp`.`stateoforigin` AS `stateoforigin`,
`sp`.`nationality` AS `nationality`,
`sp`.`nin` AS `nin`,
`sp`.`gender` AS `gender`,
`sp`.`height` AS `height`,
`sp`.`weight` AS `weight`,
`sp`.`fathername` AS `fathername`,
`sp`.`fatheroccupation` AS `fatheroccupation`,
`sp`.`mothername` AS `mothername`,
`sp`.`motheroccupation` AS `motheroccupation`,
`sp`.`fatherpermaddress` AS `fatherpermaddress`,
`sp`.`fatherphonenumber` AS `fatherphonenumber`,
`sp`.`motherpermaddress` AS `motherpermaddress`,
`sp`.`motherphonenumber` AS `motherphonenumber`,
`sp`.`guardianname` AS `guardianname`,
`sp`.`guardianoccupation` AS `guardianoccupation`,
`sp`.`guardianpermaddress` AS `guardianpermaddress`,
`sp`.`guardianphonenumber` AS `guardianphonenumber`,
`sp`.`email` AS `email`,
`sp`.`familytype` AS `familytype`,
`sp`.`familysize` AS `familysize`,
`sp`.`positioninfamily` AS `positioninfamily`,
`sp`.`noofbrothers` AS `noofbrothers`,
`sp`.`noofsisters` AS `noofsisters`,
`sp`.`parentreligion` AS `parentreligion`,
`sp`.`disability` AS `disability`,
`sp`.`bloodgroup` AS `bloodgroup`,
`sp`.`genotype` AS `genotype`,
`sp`.`vision` AS `vision`,
`sp`.`hearing` AS `hearing`,
`sp`.`speech` AS `speech`,
`sp`.`generalvitality` AS `generalvitality`,
`sp`.`classgiven` AS `classgiven`,
`sp`.`classgroup` AS `classgroup`,
`sp`.`last_updated` AS `last_updated`,
(select `futaprysch`.`session_setup`.`sessionid` from `futaprysch`.`session_setup` where (`futaprysch`.`session_setup`.`activeflag` = 1)) AS `schoolsession`,
(select `futaprysch`.`session_setup`.`session` from `futaprysch`.`session_setup` where (`futaprysch`.`session_setup`.`activeflag` = 1)) AS `sessionname`,
(select `futaprysch`.`term_setup`.`termid` from `futaprysch`.`term_setup` where (`futaprysch`.`term_setup`.`activeflag` = 1)) AS `schoolterm`,
(select `futaprysch`.`term_setup`.`term` from `futaprysch`.`term_setup` where (`futaprysch`.`term_setup`.`activeflag` = 1)) AS `termname` 
from `futaprysch`.`student_profile` `sp`



------------------
CREATE OR REPLACE VIEW view_menu AS

SELECT 
m.`menuid`,
m.`menuposition`,
m.`menutitle`, 
m.`menudescription`, 
m.`menuroute`, 
m.`menucategory`, 
(SELECT c.`category` FROM `categorytable` AS c WHERE c.categoryid = m.menucategory) AS category,
m.`menurole`, 
m.`created_at`,
m.`updated_at`

FROM `menu`AS m


---------------------------------

CREATE VIEW userlogin AS
(
    SELECT 
TRIM(sp.`regno`) AS username,
COALESCE((SELECT pwd FROM password_table AS pt WHERE pt.studentno = sp.regno),
    md5(UPPER(TRIM(sp.`surname`)))) AS password,
TRIM(sp.`email`) AS email,
'student' AS category
FROM `student_profile` AS sp

UNION

SELECT 
TRIM(ssp.`empno`) AS username,
COALESCE((SELECT pwd FROM password_table AS pt WHERE pt.studentno = ssp.empno),
    md5(UPPER(TRIM(ssp.`surname`)))) AS password,
TRIM(ssp.`email`) AS email,
TRIM(ssp.`position`) AS category
FROM `staff_profile` AS ssp
    )


---------------------------

CREATE OR REPLACE VIEW view_staffprofile AS
SELECT 
spr.`staffid`,
spr.`empno` AS regno,
CONCAT(spr.`surname`, ' ', spr.`othernames`) AS fullname, 
spr.`dob`, 
spr.`hometown`, 
spr.`lga`,
spr.`stateoforigin`, 
spr.`permanentaddress`, 
spr.`nin`, 
spr.`email`, 
spr.`phonenumber`, 
spr.`position`, 
spr.`gender`, 
spr.`ethnicity`, 
spr.`religion`,

spr.`weight`, 
spr.`height`, 
spr.`disability`, 
spr.`bloodgroup`, 
spr.`genotype`, 
spr.`vision`, 
spr.`hearing`, 
spr.`speech`, 
spr.`generalvitality`, 
spr.`nationality`, 
spr.`nextofkin`, 
spr.`nextofkinrelationship`, 
spr.`nextofkinnin`, 
spr.`nextofkinoccupation`, 
spr.`nextofkinaddress`, 
spr.`nextofkinphonenumber`, 
spr.`startedon`, 
spr.`courseofstudy`, 
spr.`qualification`, 
spr.`dateofaward`, 
spr.`lastupdate`

FROM `staff_profile` spr


---------------------


eng, yor, frc, mat, intsc, introtech, agric scince, homeecons, socialstudies, businessstudies, music, fineart, crk, physical and heath, physics, chemistry, biology, geography, economics, furthermaths, computer, civic education, totalpassed, remarks, followup action



------------------------------
CREATE OR REPLACE VIEW view_broadsheet AS
SELECT 
vs.`studentno`, 
vs.`fullname`,
vs.`class`,
COALESCE((SELECT v.`cumavg2` FROM view_scoresheet AS v WHERE v.studentno = vs.studentno AND v.subjects = 'ENG'), '') AS engscore,
COALESCE((SELECT v.`cumavg2` FROM view_scoresheet AS v WHERE v.studentno = vs.studentno AND v.subjects = 'FRC'), '') AS frcscore,
COALESCE((SELECT v.`cumavg2` FROM view_scoresheet AS v WHERE v.studentno = vs.studentno AND v.subjects = 'MAT'), '') AS matscore,
COALESCE((SELECT v.`cumavg2` FROM view_scoresheet AS v WHERE v.studentno = vs.studentno AND v.subjects = 'ANH'), '') AS anhscore,
COALESCE((SELECT v.`cumavg2` FROM view_scoresheet AS v WHERE v.studentno = vs.studentno AND v.subjects = 'YOR'), '') AS yorscore,
COALESCE((SELECT v.`cumavg2` FROM view_scoresheet AS v WHERE v.studentno = vs.studentno AND v.subjects = 'CHM'), '') AS chmscore,
COALESCE((SELECT v.`cumavg2` FROM view_scoresheet AS v WHERE v.studentno = vs.studentno AND v.subjects = 'PHY'), '') AS physcore,
COALESCE((SELECT v.`cumavg2` FROM view_scoresheet AS v WHERE v.studentno = vs.studentno AND v.subjects = 'CRK'), '') AS crkscore,
COALESCE((SELECT v.`cumavg2` FROM view_scoresheet AS v WHERE v.studentno = vs.studentno AND v.subjects = 'CCP'), '') AS ccpscore,
COALESCE((SELECT v.`cumavg2` FROM view_scoresheet AS v WHERE v.studentno = vs.studentno AND v.subjects = 'AGR'), '') AS agrscore,
COALESCE((SELECT v.`cumavg2` FROM view_scoresheet AS v WHERE v.studentno = vs.studentno AND v.subjects = 'BIO'), '') AS bioscore,
COALESCE((SELECT v.`cumavg2` FROM view_scoresheet AS v WHERE v.studentno = vs.studentno AND v.subjects = 'FMT'), '') AS fmtscore,
(SELECT COUNT(*) FROM view_scoresheet AS v WHERE v.studentno = vs.studentno AND v.cumavg2 > 40 ) AS totalpasses

FROM `view_scoresheet` AS vs 
WHERE schoolterm = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1) AND `schoolsession` = (SELECT sst.sessionid FROM session_setup AS sst WHERE sst.activeflag=1 ORDER BY vs.`subjects`, vs.`class`)



-----------------------------


CREATE OR REPLACE VIEW gradebook_view AS
SELECT 
sp.`studentid`, sp.`regno`, sp.`passport`, sp.`surname`, sp.`othernames`, sp.`dob`, sp.`class`, sp.`hometown`, sp.`lga`, sp.`stateoforigin`, sp.`nationality`, sp.`nin`, sp.`gender`, sp.`height`, sp.`weight`, sp.`fathername`, sp.`fatheroccupation`, sp.`mothername`, sp.`motheroccupation`, sp.`fatherpermaddress`, sp.`fatherphonenumber`, sp.`motherpermaddress`, sp.`motherphonenumber`, sp.`guardianname`, sp.`guardianoccupation`, sp.`guardianpermaddress`, sp.`guardianphonenumber`, sp.`email`, sp.`familytype`, sp.`familysize`, sp.`positioninfamily`, sp.`noofbrothers`, sp.`noofsisters`, sp.`parentreligion`, sp.`disability`, sp.`bloodgroup`, sp.`genotype`, sp.`vision`, sp.`hearing`, sp.`speech`, sp.`generalvitality`, sp.`classgiven`, sp.`classgroup`, sp.`last_updated`,

COALESCE((
    SELECT sg.assessmentgrade FROM setup_gradebook AS sg, session_setup AS ss, setup_subjects AS subj WHERE sg.studentid = sp.regno AND sg.ssession = ss.sessionid AND ss.activeflag=1 AND sg.assessmenttype = 'ca1'  AND sg.studentsubject = subj.subjectcode)
 , '') AS ca1,
 
 COALESCE((
    SELECT sg.assessmentgrade FROM setup_gradebook AS sg, session_setup AS ss, setup_subjects AS subj WHERE sg.studentid = sp.regno AND sg.ssession = ss.sessionid AND ss.activeflag=1 AND sg.assessmenttype = 'ca2'  AND sg.studentsubject = subj.subjectcode)
 , '') AS ca2,
 
 COALESCE((
    SELECT sg.assessmentgrade FROM setup_gradebook AS sg, session_setup AS ss, setup_subjects AS subj WHERE sg.studentid = sp.regno AND sg.ssession = ss.sessionid AND ss.activeflag=1 AND sg.assessmenttype = 'ca3' AND sg.studentsubject = subj.subjectcode)
 , '') AS ca3,
 
 COALESCE((
SELECT sg.assessmentgrade FROM setup_gradebook AS sg, session_setup AS ss, setup_subjects AS subj WHERE sg.studentid = sp.regno AND (sg.ssession = ss.sessionid AND ss.activeflag=1) AND sg.assessmenttype = 'exam'  AND sg.studentsubject = subj.subjectcode)
 , '') AS exam,

(SELECT ss.`sessionid` FROM session_setup AS ss WHERE ss.activeflag=1) AS sessionid,

(SELECT ss.`session` FROM session_setup AS ss WHERE ss.activeflag=1) AS session


FROM `student_profile` AS sp


-----------------------------


CREATE OR REPLACE VIEW gradebook_view AS
SELECT 
sp.`studentid`, sp.`regno`, sp.`passport`, sp.`surname`, sp.`othernames`, sp.`dob`, sp.`class`, sp.`hometown`, sp.`lga`, sp.`stateoforigin`, sp.`nationality`, sp.`nin`, sp.`gender`, sp.`height`, sp.`weight`, sp.`fathername`, sp.`fatheroccupation`, sp.`mothername`, sp.`motheroccupation`, sp.`fatherpermaddress`, sp.`fatherphonenumber`, sp.`motherpermaddress`, sp.`motherphonenumber`, sp.`guardianname`, sp.`guardianoccupation`, sp.`guardianpermaddress`, sp.`guardianphonenumber`, sp.`email`, sp.`familytype`, sp.`familysize`, sp.`positioninfamily`, sp.`noofbrothers`, sp.`noofsisters`, sp.`parentreligion`, sp.`disability`, sp.`bloodgroup`, sp.`genotype`, sp.`vision`, sp.`hearing`, sp.`speech`, sp.`generalvitality`, sp.`classgiven`, sp.`classgroup`, sp.`last_updated`,

COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca1' AND sg.studentclass = sp.class)
 , '') AS ca1,
 
 COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca2' AND sg.studentclass = sp.class)
 , '') AS ca2,
 
 COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca3' AND sg.studentclass = sp.class)
 , '') AS ca3,
 
 COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'exam' AND sg.studentclass = sp.class)
 , '') AS exam,

(SELECT ss.`sessionid` FROM session_setup AS ss WHERE ss.activeflag=1) AS sessionid,

(SELECT ss.`session` FROM session_setup AS ss WHERE ss.activeflag=1) AS session


FROM `view_student_profile` AS sp


---------------


CREATE OR REPLACE VIEW gradebook_view AS
SELECT 
sp.`studentid`, sp.`regno`, sp.`fullname`, sp.`dob`, sp.`class`, sp.`hometown`, sp.`lga`, sp.`stateoforigin`, sp.`nationality`, sp.`nin`, sp.`gender`, sp.`height`, sp.`weight`, sp.`fathername`, sp.`fatheroccupation`, sp.`mothername`, sp.`motheroccupation`, sp.`fatherpermaddress`, sp.`fatherphonenumber`, sp.`motherpermaddress`, sp.`motherphonenumber`, sp.`guardianname`, sp.`guardianoccupation`, sp.`guardianpermaddress`, sp.`guardianphonenumber`, sp.`email`, sp.`familytype`, sp.`familysize`, sp.`positioninfamily`, sp.`noofbrothers`, sp.`noofsisters`, sp.`parentreligion`, sp.`disability`, sp.`bloodgroup`, sp.`genotype`, sp.`vision`, sp.`hearing`, sp.`speech`, sp.`generalvitality`, sp.`classgiven`, sp.`classgroup`, sp.`last_updated`,

subj.subjectname,



COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca1' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode)
 , '') AS ca1,
 
 COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca2' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode)
 , '') AS ca2,
 
 COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca3' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode)
 , '') AS ca3,
 
 COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'exam' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode)
 , '') AS exam,

(SELECT ss.`sessionid` FROM session_setup AS ss WHERE ss.activeflag=1) AS sessionid,

(SELECT ss.`session` FROM session_setup AS ss WHERE ss.activeflag=1) AS session


FROM `view_studentprofile` AS sp, setup_subjects AS subj


-------------------
CREATE OR REPLACE VIEW gradebook_view AS

CASE
    WHEN sp.class LIKE 'J%' THEN 
    SELECT
        sp.`studentid`, sp.`regno`, sp.`fullname`, sp.`dob`, sp.`class`, sp.`hometown`, sp.`lga`, sp.`stateoforigin`, sp.`nationality`, sp.`nin`, sp.`gender`, sp.`height`, sp.`weight`, sp.`fathername`, sp.`fatheroccupation`, sp.`mothername`, sp.`motheroccupation`, sp.`fatherpermaddress`, sp.`fatherphonenumber`, sp.`motherpermaddress`, sp.`motherphonenumber`, sp.`guardianname`, sp.`guardianoccupation`, sp.`guardianpermaddress`, sp.`guardianphonenumber`, sp.`email`, sp.`familytype`, sp.`familysize`, sp.`positioninfamily`, sp.`noofbrothers`, sp.`noofsisters`, sp.`parentreligion`, sp.`disability`, sp.`bloodgroup`, sp.`genotype`, sp.`vision`, sp.`hearing`, sp.`speech`, sp.`generalvitality`, sp.`classgiven`, sp.`classgroup`, sp.`last_updated`,

        subj.subjectname,

        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca1' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('J', 'B'))
        , '') AS ca1,
        
        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca2' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('J', 'B'))
        , '') AS ca2,
        
        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca3' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('J', 'B'))
        , '') AS ca3,
        
        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'exam' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('J', 'B'))
        , '') AS exam,

        (SELECT ss.`sessionid` FROM session_setup AS ss WHERE ss.activeflag=1) AS sessionid,

        (SELECT ss.`session` FROM session_setup AS ss WHERE ss.activeflag=1) AS session


    ----
    WHEN sp.class LIKE 'S%' THEN 
    SELECT
        sp.`studentid`, sp.`regno`, sp.`fullname`, sp.`dob`, sp.`class`, sp.`hometown`, sp.`lga`, sp.`stateoforigin`, sp.`nationality`, sp.`nin`, sp.`gender`, sp.`height`, sp.`weight`, sp.`fathername`, sp.`fatheroccupation`, sp.`mothername`, sp.`motheroccupation`, sp.`fatherpermaddress`, sp.`fatherphonenumber`, sp.`motherpermaddress`, sp.`motherphonenumber`, sp.`guardianname`, sp.`guardianoccupation`, sp.`guardianpermaddress`, sp.`guardianphonenumber`, sp.`email`, sp.`familytype`, sp.`familysize`, sp.`positioninfamily`, sp.`noofbrothers`, sp.`noofsisters`, sp.`parentreligion`, sp.`disability`, sp.`bloodgroup`, sp.`genotype`, sp.`vision`, sp.`hearing`, sp.`speech`, sp.`generalvitality`, sp.`classgiven`, sp.`classgroup`, sp.`last_updated`,

        subj.subjectname,

        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca1' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('S', 'B'))
        , '') AS ca1,
        
        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca2' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('S', 'B'))
        , '') AS ca2,
        
        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca3' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('S', 'B'))
        , '') AS ca3,
        
        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'exam' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('S', 'B'))
        , '') AS exam,

        (SELECT ss.`sessionid` FROM session_setup AS ss WHERE ss.activeflag=1) AS sessionid,

        (SELECT ss.`session` FROM session_setup AS ss WHERE ss.activeflag=1) AS session
        
    ELSE 

        SELECT
        sp.`studentid`, sp.`regno`, sp.`fullname`, sp.`dob`, sp.`class`, sp.`hometown`, sp.`lga`, sp.`stateoforigin`, sp.`nationality`, sp.`nin`, sp.`gender`, sp.`height`, sp.`weight`, sp.`fathername`, sp.`fatheroccupation`, sp.`mothername`, sp.`motheroccupation`, sp.`fatherpermaddress`, sp.`fatherphonenumber`, sp.`motherpermaddress`, sp.`motherphonenumber`, sp.`guardianname`, sp.`guardianoccupation`, sp.`guardianpermaddress`, sp.`guardianphonenumber`, sp.`email`, sp.`familytype`, sp.`familysize`, sp.`positioninfamily`, sp.`noofbrothers`, sp.`noofsisters`, sp.`parentreligion`, sp.`disability`, sp.`bloodgroup`, sp.`genotype`, sp.`vision`, sp.`hearing`, sp.`speech`, sp.`generalvitality`, sp.`classgiven`, sp.`classgroup`, sp.`last_updated`,

        subj.subjectname,

        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca1' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode)
        , '') AS ca1,
        
        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca2' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode)
        , '') AS ca2,
        
        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca3' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode)
        , '') AS ca3,
        
        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'exam' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode)
        , '') AS exam,

        (SELECT ss.`sessionid` FROM session_setup AS ss WHERE ss.activeflag=1) AS sessionid,

        (SELECT ss.`session` FROM session_setup AS ss WHERE ss.activeflag=1) AS session
END

FROM `view_studentprofile` AS sp, setup_subjects AS subj

------------------


CREATE OR REPLACE VIEW gradebook_view AS
SELECT 
sp.`studentid`, sp.`regno`, sp.`fullname`, sp.`dob`, sp.`class`, sp.`hometown`, sp.`lga`, sp.`stateoforigin`, sp.`nationality`, sp.`nin`, sp.`gender`, sp.`height`, sp.`weight`, sp.`fathername`, sp.`fatheroccupation`, sp.`mothername`, sp.`motheroccupation`, sp.`fatherpermaddress`, sp.`fatherphonenumber`, sp.`motherpermaddress`, sp.`motherphonenumber`, sp.`guardianname`, sp.`guardianoccupation`, sp.`guardianpermaddress`, sp.`guardianphonenumber`, sp.`email`, sp.`familytype`, sp.`familysize`, sp.`positioninfamily`, sp.`noofbrothers`, sp.`noofsisters`, sp.`parentreligion`, sp.`disability`, sp.`bloodgroup`, sp.`genotype`, sp.`vision`, sp.`hearing`, sp.`speech`, sp.`generalvitality`, sp.`classgiven`, sp.`classgroup`, sp.`last_updated`,

subj.subjectname,

COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca1' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('J', 'B'))
 , '') AS ca1,
 
 COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca2' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('J', 'B'))
 , '') AS ca2,
 
 COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca3' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('J', 'B'))
 , '') AS ca3,
 
 COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'exam' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('J', 'B'))
 , '') AS exam,

(SELECT ss.`sessionid` FROM session_setup AS ss WHERE ss.activeflag=1) AS sessionid,

(SELECT ss.`session` FROM session_setup AS ss WHERE ss.activeflag=1) AS session


FROM `view_studentprofile` AS sp, setup_subjects AS subj

WHERE
CASE
    WHEN sp.class LIKE 'J%' THEN subj.subjectdescription IN ('J', 'B')
    WHEN sp.class LIKE 'S%' THEN subj.subjectdescription IN ('S', 'B')
    ELSE ""
END


----------------------


---------------------


CREATE OR REPLACE VIEW gradebook_view AS
SELECT
CASE
    WHEN sp.class LIKE 'J%' THEN 
    SELECT 
        sp.`studentid`, sp.`regno` AS studentno, sp.`fullname`, sp.`dob`, sp.`class`, sp.`hometown`, sp.`lga`, sp.`stateoforigin`, sp.`nationality`, sp.`nin`, sp.`gender`, sp.`height`, sp.`weight`, sp.`fathername`, sp.`fatheroccupation`, sp.`mothername`, sp.`motheroccupation`, sp.`fatherpermaddress`, sp.`fatherphonenumber`, sp.`motherpermaddress`, sp.`motherphonenumber`, sp.`guardianname`, sp.`guardianoccupation`, sp.`guardianpermaddress`, sp.`guardianphonenumber`, sp.`email`, sp.`familytype`, sp.`familysize`, sp.`positioninfamily`, sp.`noofbrothers`, sp.`noofsisters`, sp.`parentreligion`, sp.`disability`, sp.`bloodgroup`, sp.`genotype`, sp.`vision`, sp.`hearing`, sp.`speech`, sp.`generalvitality`, sp.`classgiven`, sp.`classgroup`, sp.`last_updated`,

        subj.subjectname,

        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca1' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('J', 'B'))
        , '') AS ca1,
        
        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca2' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('J', 'B'))
        , '') AS ca2,
        
        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca3' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('J', 'B'))
        , '') AS ca3,
        
        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'exam' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('J', 'B'))
        , '') AS exam,

        (SELECT ss.`sessionid` FROM session_setup AS ss WHERE ss.activeflag=1) AS sessionid,

        (SELECT ss.`session` FROM session_setup AS ss WHERE ss.activeflag=1) AS session


    WHEN sp.class LIKE 'S%' THEN 
    SELECT
        sp.`studentid`, sp.`regno`, sp.`fullname`, sp.`dob`, sp.`class`, sp.`hometown`, sp.`lga`, sp.`stateoforigin`, sp.`nationality`, sp.`nin`, sp.`gender`, sp.`height`, sp.`weight`, sp.`fathername`, sp.`fatheroccupation`, sp.`mothername`, sp.`motheroccupation`, sp.`fatherpermaddress`, sp.`fatherphonenumber`, sp.`motherpermaddress`, sp.`motherphonenumber`, sp.`guardianname`, sp.`guardianoccupation`, sp.`guardianpermaddress`, sp.`guardianphonenumber`, sp.`email`, sp.`familytype`, sp.`familysize`, sp.`positioninfamily`, sp.`noofbrothers`, sp.`noofsisters`, sp.`parentreligion`, sp.`disability`, sp.`bloodgroup`, sp.`genotype`, sp.`vision`, sp.`hearing`, sp.`speech`, sp.`generalvitality`, sp.`classgiven`, sp.`classgroup`, sp.`last_updated`,

        subj.subjectname,

        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca1' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('S', 'B'))
        , '') AS ca1,
        
        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca2' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('S', 'B'))
        , '') AS ca2,
        
        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca3' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('S', 'B'))
        , '') AS ca3,
        
        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'exam' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('S', 'B'))
        , '') AS exam,

        (SELECT ss.`sessionid` FROM session_setup AS ss WHERE ss.activeflag=1) AS sessionid,

        (SELECT ss.`session` FROM session_setup AS ss WHERE ss.activeflag=1) AS session
        
    ELSE 

        SELECT
        sp.`studentid`, sp.`regno`, sp.`fullname`, sp.`dob`, sp.`class`, sp.`hometown`, sp.`lga`, sp.`stateoforigin`, sp.`nationality`, sp.`nin`, sp.`gender`, sp.`height`, sp.`weight`, sp.`fathername`, sp.`fatheroccupation`, sp.`mothername`, sp.`motheroccupation`, sp.`fatherpermaddress`, sp.`fatherphonenumber`, sp.`motherpermaddress`, sp.`motherphonenumber`, sp.`guardianname`, sp.`guardianoccupation`, sp.`guardianpermaddress`, sp.`guardianphonenumber`, sp.`email`, sp.`familytype`, sp.`familysize`, sp.`positioninfamily`, sp.`noofbrothers`, sp.`noofsisters`, sp.`parentreligion`, sp.`disability`, sp.`bloodgroup`, sp.`genotype`, sp.`vision`, sp.`hearing`, sp.`speech`, sp.`generalvitality`, sp.`classgiven`, sp.`classgroup`, sp.`last_updated`,

        subj.subjectname,

        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca1' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode)
        , '') AS ca1,
        
        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca2' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode)
        , '') AS ca2,
        
        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca3' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode)
        , '') AS ca3,
        
        COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'exam' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode)
        , '') AS exam,

        (SELECT ss.`sessionid` FROM session_setup AS ss WHERE ss.activeflag=1) AS sessionid,

        (SELECT ss.`session` FROM session_setup AS ss WHERE ss.activeflag=1) AS session
END

FROM `view_studentprofile` AS sp, setup_subjects AS subj


===============================


CREATE OR REPLACE VIEW gradebook_view AS
SELECT 
sp.`studentid`, sp.`regno` AS studentno, sp.`fullname`, sp.`dob`, sp.`class`, sp.`hometown`, sp.`lga`, sp.`stateoforigin`, sp.`nationality`, sp.`nin`, sp.`gender`, sp.`height`, sp.`weight`, sp.`fathername`, sp.`fatheroccupation`, sp.`mothername`, sp.`motheroccupation`, sp.`fatherpermaddress`, sp.`fatherphonenumber`, sp.`motherpermaddress`, sp.`motherphonenumber`, sp.`guardianname`, sp.`guardianoccupation`, sp.`guardianpermaddress`, sp.`guardianphonenumber`, sp.`email`, sp.`familytype`, sp.`familysize`, sp.`positioninfamily`, sp.`noofbrothers`, sp.`noofsisters`, sp.`parentreligion`, sp.`disability`, sp.`bloodgroup`, sp.`genotype`, sp.`vision`, sp.`hearing`, sp.`speech`, sp.`generalvitality`, sp.`classgiven`, sp.`classgroup`, sp.`last_updated`,

subj.subjectname,
subj.subjectcode,

COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca1' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('J', 'B'))
 , '') AS ca1,
 
 COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca2' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('J', 'B'))
 , '') AS ca2,
 
 COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'ca3' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('J', 'B'))
 , '') AS ca3,
 
 COALESCE((SELECT sg.assessmentgrade FROM setup_gradebook AS sg WHERE sg.studentid = sp.regno AND sg.ssession = sp.schoolsession AND sg.term = sp.schoolterm AND sg.assessmenttype = 'exam' AND sg.studentclass = sp.class AND sg.studentsubject=subj.subjectcode AND subj.subjectdescription IN ('J', 'B'))
 , '') AS exam,

(SELECT ss.`sessionid` FROM session_setup AS ss WHERE ss.activeflag=1) AS sessionid,

(SELECT ss.`session` FROM session_setup AS ss WHERE ss.activeflag=1) AS session


FROM `view_studentprofile` AS sp, setup_subjects AS subj

WHERE subj.subjectdescription LIKE substring(sp.class,1,1) OR  subj.subjectdescription = 'B'


------------------------


SELECT 
sp.studentid, sp.regno, sp.passport, sp.surname, sp.othernames, sp.dob, sp.class, sp.hometown, sp.lga, sp.stateoforigin, sp.nationality, sp.nin, sp.gender, sp.height, sp.weight, sp.fathername, sp.fatheroccupation, sp.mothername, sp.motheroccupation, sp.fatherpermaddress, sp.fatherphonenumber, sp.motherpermaddress, sp.motherphonenumber, sp.guardianname, sp.guardianoccupation, sp.guardianpermaddress, sp.guardianphonenumber, sp.email, sp.familytype, sp.familysize, sp.positioninfamily, sp.noofbrothers, sp.noofsisters, sp.parentreligion, sp.disability, sp.bloodgroup, sp.genotype, sp.vision, sp.hearing, sp.speech, sp.generalvitality, sp.classgiven, sp.classgroup, sp.last_updated,

COALESCE((SELECT sa.punctuality FROM setup_affectivearea AS sa WHERE sp.regno = sa.studentno AND sa.class = sp.class AND sa.session = (SELECT ss.sessionid FROM session_setup AS ss WHERE ss.activeflag=1) AND sa.term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1)), '') AS punctuality,

COALESCE((SELECT sa.neatness FROM setup_affectivearea AS sa WHERE sp.regno = sa.studentno AND sa.class = sp.class AND sa.session = (SELECT ss.sessionid FROM session_setup AS ss WHERE ss.activeflag=1) AND sa.term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1)), '') AS neatness,

COALESCE((SELECT sa.politeness FROM setup_affectivearea AS sa WHERE sp.regno = sa.studentno AND sa.class = sp.class AND sa.session = (SELECT ss.sessionid FROM session_setup AS ss WHERE ss.activeflag=1) AND sa.term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1)), '') AS politeness,

COALESCE((SELECT sa.honesty FROM setup_affectivearea AS sa WHERE sp.regno = sa.studentno AND sa.class = sp.class AND sa.session = (SELECT ss.sessionid FROM session_setup AS ss WHERE ss.activeflag=1) AND sa.term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1)), '') AS honesty,

COALESCE((SELECT sa.relationshipwithothers FROM setup_affectivearea AS sa WHERE sp.regno = sa.studentno AND sa.class = sp.class AND sa.session = (SELECT ss.sessionid FROM session_setup AS ss WHERE ss.activeflag=1) AND sa.term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1)), '') AS relationshipwithothers,

COALESCE((SELECT sa.leadership FROM setup_affectivearea AS sa WHERE sp.regno = sa.studentno AND sa.class = sp.class AND sa.session = (SELECT ss.sessionid FROM session_setup AS ss WHERE ss.activeflag=1) AND sa.term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1)), '') AS leadership,

COALESCE((SELECT sa.emotionalstability FROM setup_affectivearea AS sa WHERE sp.regno = sa.studentno AND sa.class = sp.class AND sa.session = (SELECT ss.sessionid FROM session_setup AS ss WHERE ss.activeflag=1) AND sa.term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1)), '') AS emotionalstability,

COALESCE((SELECT sa.health FROM setup_affectivearea AS sa WHERE sp.regno = sa.studentno AND sa.class = sp.class AND sa.session = (SELECT ss.sessionid FROM session_setup AS ss WHERE ss.activeflag=1) AND sa.term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1)), '') AS health,

COALESCE((SELECT sa.attitudetoschoolwork FROM setup_affectivearea AS sa WHERE sp.regno = sa.studentno AND sa.class = sp.class AND sa.session = (SELECT ss.sessionid FROM session_setup AS ss WHERE ss.activeflag=1) AND sa.term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1)), '') AS attitudetoschoolwork,

COALESCE((SELECT sa.attentiveness FROM setup_affectivearea AS sa WHERE sp.regno = sa.studentno AND sa.class = sp.class AND sa.session = (SELECT ss.sessionid FROM session_setup AS ss WHERE ss.activeflag=1) AND sa.term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1)), '') AS attentiveness,

COALESCE((SELECT sa.persevearance FROM setup_affectivearea AS sa WHERE sp.regno = sa.studentno AND sa.class = sp.class AND sa.session = (SELECT ss.sessionid FROM session_setup AS ss WHERE ss.activeflag=1) AND sa.term = (SELECT ts.termid FROM term_setup AS ts WHERE ts.activeflag=1)), '') AS persevearance

FROM student_profile AS sp


--------------------------------------





-- `affectiverecordid`, `studentno`, `class`, `session`, `term`, `punctuality`, `neatness`, `politeness`, `honesty`, `relationshipwithothers`, `leadership`, `emotionalstability`, `health`, `attitudetoschoolwork`, `attentiveness`, `persevearance`, `attendance`, `reliability`, `selfcontrol`, `cooperation`, `responsibility`, `innitiative`, `orgability`, `verbalfluency`, `games`, `sports`, `drawingpainting`, `musicalskills`, `handlingtools`

---------------------


`studentid`, `regno`, `passport`, `surname`, `othernames`, `dob`, `class`, `hometown`, `lga`, `stateoforigin`, `nationality`, `nin`, `gender`, `height`, `weight`, `fathername`, `fatheroccupation`, `mothername`, `motheroccupation`, `fatherpermaddress`, `fatherphonenumber`, `motherpermaddress`, `motherphonenumber`, `guardianname`, `guardianoccupation`, `guardianpermaddress`, `guardianphonenumber`, `email`, `familytype`, `familysize`, `positioninfamily`, `noofbrothers`, `noofsisters`, `parentreligion`, `disability`, `bloodgroup`, `genotype`, `vision`, `hearing`, `speech`, `generalvitality`, `classgiven`, `classgroup`, `last_updated`

----------------

SELECT 
sp.`studentid`, sp.`surname`, sp.`othernames`, sp.`class`, sp.`regno` AS studentno, 
(SELECT ss.sessionid FROM `session_setup` AS ss WHERE ss.activeflag=1) AS session,
(SELECT ts.termid FROM `term_setup` AS ts WHERE ts.activeflag=1) AS term,
COALESCE((SELECT sa.affectiverecordid FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS affectiverecordid,
COALESCE((SELECT sa.punctuality FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS punctuality,
COALESCE((SELECT sa.neatness FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS neatness,
COALESCE((SELECT sa.politeness FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS politeness,
COALESCE((SELECT sa.honesty FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS honesty,
COALESCE((SELECT sa.relationshipwithothers FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS relationshipwithothers,
COALESCE((SELECT sa.leadership FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS leadership,
COALESCE((SELECT sa.emotionalstability FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS emotionalstability,
COALESCE((SELECT sa.health FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS health,
COALESCE((SELECT sa.attitudetoschoolwork FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS attitudetoschoolwork,
COALESCE((SELECT sa.attentiveness FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS attentiveness,
COALESCE((SELECT sa.persevearance FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS persevearance,
COALESCE((SELECT sa.attendance FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS attendance,
COALESCE((SELECT sa.reliability FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS reliability,
COALESCE((SELECT sa.selfcontrol FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS selfcontrol,
COALESCE((SELECT sa.cooperation FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS cooperation,
COALESCE((SELECT sa.responsibility FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS responsibility,
COALESCE((SELECT sa.innitiative FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS innitiative,
COALESCE((SELECT sa.orgability FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS orgability,
COALESCE((SELECT sa.verbalfluency FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS verbalfluency,
COALESCE((SELECT sa.games FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS games,
COALESCE((SELECT sa.sports FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS sports,
COALESCE((SELECT sa.drawingpainting FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS drawingpainting,
COALESCE((SELECT sa.musicalskills FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS musicalskills,
COALESCE((SELECT sa.handlingtools FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS handlingtools



FROM `student_profile` AS sp


------------------------------



CREATE OR REPLACE VIEW view_affectiveareas AS
SELECT 
sp.`studentid`, sp.`surname`, sp.`othernames`, sp.`class`, sp.`regno` AS studentno, 
(SELECT ss.sessionid FROM `session_setup` AS ss WHERE ss.activeflag=1) AS session,
(SELECT ts.termid FROM `term_setup` AS ts WHERE ts.activeflag=1) AS term,
COALESCE((SELECT sa.affectiverecordid FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS affectiverecordid,
COALESCE((SELECT sa.punctuality FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS punctuality,
COALESCE((SELECT sa.neatness FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS neatness,
COALESCE((SELECT sa.politeness FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS politeness,
COALESCE((SELECT sa.honesty FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS honesty,
COALESCE((SELECT sa.relationshipwithothers FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS relationshipwithothers,
COALESCE((SELECT sa.leadership FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS leadership,
COALESCE((SELECT sa.emotionalstability FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS emotionalstability,
COALESCE((SELECT sa.health FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS health,
COALESCE((SELECT sa.attitudetoschoolwork FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS attitudetoschoolwork,
COALESCE((SELECT sa.attentiveness FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS attentiveness,
COALESCE((SELECT sa.persevearance FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS persevearance,
COALESCE((SELECT sa.attendance FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS attendance,
COALESCE((SELECT sa.reliability FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS reliability,
COALESCE((SELECT sa.selfcontrol FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS selfcontrol,
COALESCE((SELECT sa.cooperation FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS cooperation,
COALESCE((SELECT sa.responsibility FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS responsibility,
COALESCE((SELECT sa.innitiative FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS innitiative,
COALESCE((SELECT sa.orgability FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS orgability,
COALESCE((SELECT sa.verbalfluency FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS verbalfluency,
COALESCE((SELECT sa.games FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS games,
COALESCE((SELECT sa.sports FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS sports,
COALESCE((SELECT sa.drawingpainting FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS drawingpainting,
COALESCE((SELECT sa.musicalskills FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS musicalskills,
COALESCE((SELECT sa.handlingtools FROM setup_affectivearea AS sa WHERE sa.studentno = sp.regno), '') AS handlingtools



FROM `student_profile` AS sp



========================


select `sp`.`studentid` AS `studentid`,`sp`.`regno` AS `studentno`,`sp`.`fullname` AS `fullname`,`sp`.`dob` AS `dob`,`sp`.`class` AS `class`,`sp`.`hometown` AS `hometown`,`sp`.`lga` AS `lga`,`sp`.`stateoforigin` AS `stateoforigin`,`sp`.`nationality` AS `nationality`,`sp`.`nin` AS `nin`,`sp`.`gender` AS `gender`,`sp`.`height` AS `height`,`sp`.`weight` AS `weight`,`sp`.`fathername` AS `fathername`,`sp`.`fatheroccupation` AS `fatheroccupation`,`sp`.`mothername` AS `mothername`,`sp`.`motheroccupation` AS `motheroccupation`,`sp`.`fatherpermaddress` AS `fatherpermaddress`,`sp`.`fatherphonenumber` AS `fatherphonenumber`,`sp`.`motherpermaddress` AS `motherpermaddress`,`sp`.`motherphonenumber` AS `motherphonenumber`,`sp`.`guardianname` AS `guardianname`,`sp`.`guardianoccupation` AS `guardianoccupation`,`sp`.`guardianpermaddress` AS `guardianpermaddress`,`sp`.`guardianphonenumber` AS `guardianphonenumber`,`sp`.`email` AS `email`,`sp`.`familytype` AS `familytype`,`sp`.`familysize` AS `familysize`,`sp`.`positioninfamily` AS `positioninfamily`,`sp`.`noofbrothers` AS `noofbrothers`,`sp`.`noofsisters` AS `noofsisters`,`sp`.`parentreligion` AS `parentreligion`,`sp`.`disability` AS `disability`,`sp`.`bloodgroup` AS `bloodgroup`,`sp`.`genotype` AS `genotype`,`sp`.`vision` AS `vision`,`sp`.`hearing` AS `hearing`,`sp`.`speech` AS `speech`,`sp`.`generalvitality` AS `generalvitality`,`sp`.`classgiven` AS `classgiven`,`sp`.`classgroup` AS `classgroup`,`sp`.`last_updated` AS `last_updated`,`subj`.`subjectname` AS `subjectname`,`subj`.`subjectcode` AS `subjectcode`,coalesce((select `sg`.`assessmentgrade` from `futaprysch`.`setup_gradebook` `sg` where ((`sg`.`studentid` = `sp`.`regno`) and (`sg`.`ssession` = `sp`.`schoolsession`) and (`sg`.`term` = `sp`.`schoolterm`) and (`sg`.`assessmenttype` = 'ca1') and (`sg`.`studentclass` = `sp`.`class`) and (`sg`.`studentsubject` = `subj`.`subjectcode`) and (`subj`.`subjectdescription` in ('J','B')))),'') AS `ca1`,coalesce((select `sg`.`assessmentgrade` from `futaprysch`.`setup_gradebook` `sg` where ((`sg`.`studentid` = `sp`.`regno`) and (`sg`.`ssession` = `sp`.`schoolsession`) and (`sg`.`term` = `sp`.`schoolterm`) and (`sg`.`assessmenttype` = 'ca2') and (`sg`.`studentclass` = `sp`.`class`) and (`sg`.`studentsubject` = `subj`.`subjectcode`) and (`subj`.`subjectdescription` in ('J','B')))),'') AS `ca2`,coalesce((select `sg`.`assessmentgrade` from `futaprysch`.`setup_gradebook` `sg` where ((`sg`.`studentid` = `sp`.`regno`) and (`sg`.`ssession` = `sp`.`schoolsession`) and (`sg`.`term` = `sp`.`schoolterm`) and (`sg`.`assessmenttype` = 'ca3') and (`sg`.`studentclass` = `sp`.`class`) and (`sg`.`studentsubject` = `subj`.`subjectcode`) and (`subj`.`subjectdescription` in ('J','B')))),'') AS `ca3`,coalesce((select `sg`.`assessmentgrade` from `futaprysch`.`setup_gradebook` `sg` where ((`sg`.`studentid` = `sp`.`regno`) and (`sg`.`ssession` = `sp`.`schoolsession`) and (`sg`.`term` = `sp`.`schoolterm`) and (`sg`.`assessmenttype` = 'exam') and (`sg`.`studentclass` = `sp`.`class`) and (`sg`.`studentsubject` = `subj`.`subjectcode`) and (`subj`.`subjectdescription` in ('J','B')))),'') AS `exam`,(select `ss`.`sessionid` from `futaprysch`.`session_setup` `ss` where (`ss`.`activeflag` = 1)) AS `sessionid`,(select `ss`.`session` from `futaprysch`.`session_setup` `ss` where (`ss`.`activeflag` = 1)) AS `session` from `futaprysch`.`view_studentprofile` `sp` join `futaprysch`.`setup_subjects` `subj` where ((`subj`.`subjectdescription` like substr(`sp`.`class`,1,1)) or (`subj`.`subjectdescription` = 'B'))