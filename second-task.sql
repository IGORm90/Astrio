SELECT w.first_name,
		w.last_name ,
        c.model,
        GROUP_CONCAT(ch.name) as name
FROM worker AS w 
INNER JOIN car AS c ON c.user_id = w.id
INNER JOIN child AS ch ON ch.user_id = w.id
GROUP BY w.id;