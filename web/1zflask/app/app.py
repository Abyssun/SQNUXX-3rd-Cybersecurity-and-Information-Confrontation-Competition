import os
import flask
from flask import Flask, request, send_from_directory, send_file

app = Flask(__name__)

@app.route('/findflag')
def findflag():
    cmd = request.args.get('TTYCTFF', 'ls /')
    result = os.popen(cmd).read()
    return result
    
@app.route('/robots.txt')
def static_from_root():
    return send_from_directory(app.static_folder,'robots.txt')
    
@app.route('/tyctf')
def get_source():
    file_path = "app.py"
    return send_file(file_path, as_attachment=True)
 
if __name__ == '__main__':
    app.run(debug=True)
