import MySQLdb as mdb

sql_host="172.19.108.132"
sql_username="dustin"
sql_password='$outhHi11s'
sql_database="dustin"

sql_connection=mdb.connect(sql_host,sql_username,sql_password,sql_database)
stmt="INSERT INTO AUTHOR (AUTHOR_NUM,AUTHOR_LAST,AUTHOR_FIRST) values(%s,%s,%s)"
data=[
	(1,'Morrison','Toni'),
	(2,'Solotaroff','Paul'),
	(3,'Vintage','Vernor'),
	(4,'Francis','Dick'),
	(5,'Straub','Peter'),
	(6,'King','Stephen'),
	(7,'Pratt','Philip'),
	(8,'Chase','Truddi'),
	(9,'Collins','Bradley'),
	(10,'Heller','Joseph'),
	(11,'Wills','Gary'),
	(12,'Hofstadter','Douglas R.'),
	(13,'Lee','Harper'),
	(14,'Ambrose','Stephen E.'),
	(15,'Rowling','J.K.'),
	(16,'Salinger','J.D.'),
	(17,'Heaney','Seamus'),
	(18,'Camus','Albert'),
	(19,'Collins, Jr.','Bradley'),
	(20,'Steinbeck','John'),
	(21,'Castelman','Riva'),
	(22,'Owen','Barbara'),
	(23,'O''Rourke','Randy'),
	(24,'Kidder','Tracy'),
	(25,'Schleining','Lon')
     ]
	
cursor = sql_connection.cursor()
cursor.executemany(stmt,data)

#output= cursor.fetchall()
sql_connection.commit()
cursor.close()
sql_connection.close()
