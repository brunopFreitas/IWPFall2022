module.exports = {

    checkMyJWT: function (jwt) {
        var jwt = require('jsonwebtoken')
        newJWT =  jwt.verify(process.env.JWT,jwt, (err, validJWT) => {
            if(err) {
                return false
            } else {
                return true
            }
        })
    }


}



