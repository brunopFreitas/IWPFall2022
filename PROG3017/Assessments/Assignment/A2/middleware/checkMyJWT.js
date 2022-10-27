module.exports = {

    checkMyJWT: function (token) {
        let jwt = require('jsonwebtoken')
        let isTokenValid = jwt.verify(token, process.env.JWT, (err, validJWT) => {
            if(validJWT) {
                console.log("ITs valid")
                return true
            } else {
                console.log("ITs not valid")
                return false
            }
        })
        return isTokenValid
    }


}



