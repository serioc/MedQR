# import the Flask class from the flask module
from flask import Flask, render_template, redirect, url_for, request
import pyqrcode
import uuid
import subprocess
import tempfile
import os

# create the application object
app = Flask(__name__, static_folder='static', static_url_path='/static')

# use decorators to link the function to a url
@app.route('/', methods=['GET', 'POST'])
def qrcode():
    #link = "www.medqr.net\public?id=" + profileId
    return render_template('landing_page.html')

@app.route('/register_form.html', methods=['GET', 'POST'])
def register():
    return render_template('register_form.html')  # render a template

@app.route('/register_form.php', methods=['GET', 'POST'])
def register1():
    url = pyqrcode.create(str(uuid.uuid4()))  #inputs random text....$_POST would input form data?
    url.png(str(uuid.uuid4()), scale=8)  #creates qr code with random name
    return render_template('success.html')

@app.route('/login.html')
def login():
    return render_template('login.html')  # render a template

@app.route('/welcome')
def welcome():
    return render_template('welcome.html')  # render a template

# start the server with the 'run()' method
if __name__ == '__main__':
    app.run(debug=True)


