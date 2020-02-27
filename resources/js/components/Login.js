import React from 'react';
import ReactDOM from 'react-dom';

class Login extends React.Component {
    render() {
        return (
            <div className="card">
                <div className="card-header">Login</div>
                <div className="card-body">
                <div className="form-group row">
                                    <label htmlFor="email" className="col-md-4 col-form-label text-md-right">
                                        Email</label>

                                    <div className="col-md-6">
                                        <input id="email" type="email"
                                               className="form-control"
                                               name="email" value=""
                                               required
                                               autoComplete="email"
                                               autoFocus />
                                    </div>
                                </div>
                <div className="form-group row">
                                    <label htmlFor="password" className="col-md-4 col-form-label text-md-right">Contraseña</label>

                                    <div className="col-md-6">
                                        <input id="password" type="password"
                                               className="form-control"
                                               name="password"
                                               required
                                               autoComplete="current-password" />
                                    </div>
                                </div>
                <div className="form-group row mb-0">
                                    <div className="col-md-8 offset-md-4">
                                        <button type="submit" className="btn btn-primary">
                                            Entrar
                                        </button>
                                    </div>
                                </div>
                </div>
            </div>
        );
    }
}

export default Login;

if (document.getElementById('login')) {
    ReactDOM.render(<Login />, document.getElementById('login'));
}
