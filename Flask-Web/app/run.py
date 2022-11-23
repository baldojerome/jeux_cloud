from flask import Flask
from flask_bootstrap import Bootstrap
from blueprints import main
from login_init import login_manager
import database_init

if __name__ == "__main__":

    #Initialisation of application
    app = Flask(__name__)
    app.config.from_object('config.DevConfig')
    login_manager.init_app(app)
    Bootstrap(app)
    database_init.init_app(app)

    app.register_blueprint(main)

    # Start Server
    app.run(host='0.0.0.0',port=5000)