/* ---------- Login Page Styles ---------- */

.login-form {
    background: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
    width: 100%;
    max-width: 400px;
    margin: 120px auto 0 auto;
}

.login-form h2 {
    color: #2e5d34;
    font-family: 'Georgia', serif;
    margin-bottom: 20px;
    text-align: center;
}

.login-form .form-group {
    margin-bottom: 15px;
}

.login-form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #2e5d34;
}

.login-form input[type="email"],
.login-form input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.login-form .btn {
    background-color: #2e5d34;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s;
}

.login-form .btn:hover {
    background-color: #244928;
}

.login-form .error {
    color: #c0392b;
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    border-radius: 5px;
    padding: 10px;
    text-align: center;
    margin-bottom: 15px;
}

.login-form .links {
    text-align: center;
    margin-top: 20px;
}

.login-form .links a {
    color: #2e5d34;
    text-decoration: none;
    font-weight: bold;
}

.login-form .links a:hover {
    text-decoration: underline;
}
