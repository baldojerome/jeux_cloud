from flask import Blueprint
import controller as c

main = Blueprint('main',__name__, url_prefix="/")

main.route("/",                                 methods=['GET'])            (c.main_index)
main.route("/login",                            methods=['GET', 'POST'])    (c.main_login)
main.route("/logout",                           methods=['GET'])            (c.main_logout)
main.route('/register',                         methods=['GET','POST'])     (c.user_create)