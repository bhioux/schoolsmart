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



-- AUTHENTICATITION VIEW QUERIES

CREATE VIEW userlogin AS
SELECT 
TRIM(sp.`regno`) AS username,
COALESCE((SELECT pwd FROM password_table AS pt WHERE pt.studentno = sp.regno),
    md5(UPPER(TRIM(sp.`surname`)))) AS password,
TRIM(sp.`email`) AS email,
'student' AS category
FROM `student_profile` AS sp



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