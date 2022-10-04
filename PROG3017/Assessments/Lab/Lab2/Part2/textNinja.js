function addToText(fileName, textToAdd) {
    var fs = require('fs');

    //create new file and append, or just append
    fs.appendFile(fileName, textToAdd, function (err) {
        if (err) throw err;
        console.log('Saved!');
    });


}

module.exports.addToText = addToText;