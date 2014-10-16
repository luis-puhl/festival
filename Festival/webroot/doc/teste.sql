/*
clientes que compraram acima da media
*/

INSERT INTO `festival`.`users`
(`id`,
`username`,
`password`,
`fname`,
`lname`,
`rg`,
`cpf`)
VALUES
(3,
"icaro",
"",
"Icaro",
"Fonzar",
123654,
1892734897);


INSERT INTO `festival`.`clients`
(`id`,
`user_id`)
VALUES
(1,
3);


select u.fname, u.lname from festival.clients c 
	inner join festival.tickets t on t.client_id = c.id
	inner join festival.`events` e on t.event_id = e.id
	inner join festival.users u on c.user_id = u.id
group by c.id
having avg(price) >= all (
	select avg(e.price) from festival.clients c 
		inner join festival.tickets t on t.client_id = c.id
		inner join festival.`events` e on t.event_id = e.id
	group by c.id
	)
;

