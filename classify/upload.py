import pymysql


def upload(image, ID):
    conn = pymysql.connect(host='127.0.0.1',user='root',passwd='123456',db='metal')
    cursor = conn.cursor()
    sql="update data set target=(%s),where ID=ID, image=image"
    cursor.execute(sql)
    conn.commit()