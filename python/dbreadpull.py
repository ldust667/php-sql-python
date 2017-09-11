import MySQLdb as mdb

sql_host="172.19.108.132"
sql_username="dustin"
sql_password='$outhHi11s'
sql_database="dustin"

sql_connection=mdb.connect(sql_host,sql_username,sql_password,sql_database)

cursor = sql_connection.cursor()
cursor.execute("select * from AUTHOR")

#output= cursor.fetchmany(size=3) #returns a tuple
output=cursor.fetchone()
print output[1]
sql_connection.commit()
cursor.close()
sql_connection.close()
