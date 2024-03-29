import axios from 'axios';


const SET_LOGIN_PENDING = 'SET_LOGIN_PENDING';
const SET_LOGIN_SUCCESS = 'SET_LOGIN_SUCCESS';
const SET_LOGIN_ERROR = 'SET_LOGIN_ERROR';
const IS_AUTHENTICATED = 'IS_AUTHENTICATED';

export function login(email, password, history) {
  return dispatch => {
    dispatch(setLoginPending(true));
    dispatch(setLoginSuccess(false));
    dispatch(setLoginError(null));
    dispatch(setIsAuthenticated(localStorage.getItem('isAuthenticated')));
    
    
    
    return callLoginApi(email, password).then(response => {
      dispatch(setLoginPending(false));
      dispatch(setLoginSuccess(true));
      dispatch(setIsAuthenticated(true));
      return response
    });
  }
}

function setLoginPending(isLoginPending) {
  return {
    type: SET_LOGIN_PENDING,
    isLoginPending
  };
}

function setLoginSuccess(isLoginSuccess) {
  return {
    type: SET_LOGIN_SUCCESS,
    isLoginSuccess
  };
}

function setLoginError(loginError) {
  return {
    type: SET_LOGIN_ERROR,
    loginError
  }
}

function setIsAuthenticated(isAuthenticated) {
  return {
    type: IS_AUTHENTICATED,
    isAuthenticated
  }
}

function callLoginApi(email, password, callback) {
  var authOptions = {
    method: 'POST',
    url: 'http://localhost/api/auth/login',
    data: {
      "email": email,
      "password": password,
      "remember_me": true
    },
    json: true
  };
  return axios(authOptions)
    .then(
      res => {
        localStorage.setItem('token', res.data.access_token)
        return axios.get('http://localhost/api/auth/user',{
          headers: {
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${res.data.access_token}`
          }
        } ).then(
          res => {
            //return localStorage.setItem('user',JSON.stringify(res.data))
            return res.data
          }
        )
        //return callback({error: false, data: res.data});
      },
      error => {
        const err = Object.assign({}, error)
        return err.response.data.message
      }
    )
}

export default function reducer(state = {
  isLoginSuccess: false,
  isLoginPending: false,
  loginError: null,
  isAuthenticated: localStorage.getItem('isAuthenticated')
}, action) {
  switch (action.type) {
    case SET_LOGIN_PENDING:
      return Object.assign({}, state, {
        isLoginPending: action.isLoginPending
      });
    
    case SET_LOGIN_SUCCESS:
      return Object.assign({}, state, {
        isLoginSuccess: action.isLoginSuccess
      });
    
    case SET_LOGIN_ERROR:
      return Object.assign({}, state, {
        loginError: action.loginError
      });
  
    case IS_AUTHENTICATED:
      return Object.assign({}, state, {
        isAuthenticated: action.isAuthenticated
      });
    
    default:
      return state;
  }
}