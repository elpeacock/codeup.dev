        "use strict";
        // list of allowed keys - object
        var allowedKeys = {
            37: 'left',
            38: 'up',
            39: 'right',
            40: 'down',
            65: 'a',
            66: 'b'
        };

        // the Konami Code sequence
        var konamiCode = ['up', 'up', 'down', 'down', 'left', 'right', 'left', 'right', 'b', 'a'];

        // remember the index
        var i = 0;

        // event listener
        $(document).keyup(function(e) {
            // get the key code
            var key = allowedKeys[e.keyCode];
            // get the required key from konami code
            var requiredKey = konamiCode[i];

            // compare the key with the required key
            if (key == requiredKey) {

                // move to the next key 
                i += 1;

                // if the last key is reached, activate
                if (i == konamiCode.length)
                    activated();
                } else
                    i = 0;
        });

        function activated() {

            alert("activated");

            var limit = 100, // Max number of stars
            body = document.body;
            var loop = {
                //initilizeing
                start:function(){
                    for (var i=0; i <= limit; i++) {
                        var star=this.newStar();
                        star.style.top=this.rand()*100+"%";
                        star.style.left=this.rand()*100+"%";
                        star.style.webkitAnimationDelay=this.rand()+"s";
                        star.style.mozAnimationDelay=this.rand()+"s";
                        body.appendChild(star);
                    };
                },
                //to get random number
                rand:function(){
                    return Math.random();
                },
                //createing html dom for star
                newStar:function(){
                    var d = document.createElement('div');
                    d.innerHTML = '<figure class="star"><figure class="star-top"></figure><figure class="star-bottom"></figure></figure>';
                        return d.firstChild;
                },
            };
            loop.start();
        };  
     

