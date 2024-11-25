from flask import Flask, session, request, render_template_string
import flask
import os

app = Flask(__name__)
app.secret_key = 'IronDragon'

@app.route('/')
def index():
    session['role'] = {
        'is_admin': 0,
        'name': 'Augustine'
    }
    with open(__file__, 'r') as file:
        code = file.read()
    return code

@app.route('/admin')
def admin_handler():
    try:
        role = session.get('role')
        if not isinstance(role, dict):
            raise Exception
    except Exception:
        return 'Without you, you are an intruder!'

    if role.get('is_admin') == 1 and role.get('name') == 'Aili':
        flag = os.popen("cat /flag").read()
        message = "Oh, I believe in you! The flag is: %s" % flag
        return render_template_string(message)
    else:
        return "Error: You don't have the power!"

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=80)