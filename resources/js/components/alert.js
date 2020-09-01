$(document).ready(function(){
    $(".toast-body").html("some message from here");
    $(".toast").toast({
        delay: 3000
    });

    $(".toast").toast("show");
    this.hidden = true;
});