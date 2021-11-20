$(document).ready(function(){
              $.cookieBar({
                policyButton: false,
                  fixed: true,
                  bottom: true,
                  message: '<b>Attention!</b> This webpage uses cookies. For further details please read <a href="#" class="cb-policy">terms of use</a> as well as <a href="#" class="cb-policy">Privacy Policy</a><br><br>',
                  acceptButton: true,
                    acceptText: 'I accept the use of cookies <sup>[&#10003;]</sup>',
                    zindex:30,
               });
});
      