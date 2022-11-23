import requests
import json
from flask import render_template, flash, redirect, url_for, request, jsonify
from flask_login import login_user, logout_user, login_required, current_user
from models import LoginForm, RegisterForm, User
from config import DB

########
# MAIN #
########

def main_index():
    return render_template('index.html')

def main_login():
    form = LoginForm()

# POST Request
    if form.is_submitted():
        response = requests.post(
            DB.URL+'/login', 
            data=json.dumps( {
                "username":form.username.data,
                "password":form.password.data
            }), 
            headers={'Content-Type': 'application/json'})

    # Connection Reussie    
        if response.status_code == 200:

            # Set up User
            data = response.json()["data"]
            user = User(id = data['id'],
                name = data['name'],
                username = data['username'],
                email = data['email'],
                profil = data['profil'],
                token = data['token'])

            # Login User
            login_user(user)
            User.c_user = user

            # Redirect
            flash('Connexion reussie')
            return redirect(url_for('main.main_index')) 
        
    # Connection Echoue
        else:
            flash('Identifiants invalides.')
            return redirect(url_for('main.main_login')) 
    
# GET Request
    else:
        return render_template("login.html", form = form)

@login_required
def main_logout():
    logout_user()
    return redirect('/')
    
def user_create():
    form=RegisterForm()

# POST Request
    if form.is_submitted():
        response = requests.post(
            DB.URL+'/users/create', 
            data=json.dumps( {
                "name":form.name.data,
                "username":form.username.data,
                "email":form.email.data,
                "password":form.password.data
            }), 
            headers={'Content-Type': 'application/json'})

    # Ajout Reussie    
        if response.status_code == 200:
            if not current_user.is_authenticated:
                # Login User
                data = response.json()
                user = User(
                    name=form.name.data, 
                    username=form.username.data, 
                    email=form.email.data,
                    id=data['id'],
                    token=data['token'],
                    profil="user"
                    )
                login_user(user)
                User.c_user = user

            # Redirect
            if current_user.profil == "admin":
                flash('Ajout reussie')
                return redirect(url_for('user.user_index'))
            else:
                flash('Connexion reussie')
                return redirect(url_for('main.main_index')) 
        
    # Ajout Echoue
        else:
            flash(response.json()['message'])
            return redirect(url_for('user.user_create')) 

# GET Request
    else:
        return render_template('user_create.html', form=form)