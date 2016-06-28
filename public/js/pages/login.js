(function(){

    var loginPage = {};

    Object.defineProperties(loginPage, {
        getInputs: {
            value: function(){
                var form = document.querySelector('form input');
                for(index in form){
                    console.log(index);
                }
            },
        }
    });
    
    
    
}());