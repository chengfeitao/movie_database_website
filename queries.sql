SELECT A.first, A.last
FROM 
(SELECT MA.aid
FROM (SELECT M.id FROM Movie M WHERE M.title='Die Another Day') S1, MovieActor MA 
WHERE MA.mid=S1.id) S2, Actor A
WHERE A.id=S2.aid;

SELECT COUNT(*) FROM (SELECT A.first, A.last
FROM 
(SELECT MA.aid
FROM (SELECT M.id FROM Movie M WHERE M.title='Die Another Day') S1, MovieActor MA 
WHERE MA.mid=S1.id) S2, Actor A
WHERE A.id=S2.aid) S3;

SELECT COUNT(*) FROM (SELECT MA.aid, COUNT(*) FROM MovieActor MA GROUP BY MA.aid HAVING COUNT(*)>1) S;
