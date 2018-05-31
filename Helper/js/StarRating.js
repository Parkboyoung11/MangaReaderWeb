$('.buttonVote').on("click",function(){ 
    var displaymode = $("#rating").css("display");
    var ratingTop = $(".settingBtnBoxRight").position().top - 30 ;   
    var ratingLeft = $(".settingBtnBoxRight").position().left;

    if (displaymode == 'none') {
        $("#rating").css("top", ratingTop).css("left", ratingLeft);
        $("#rating").css("display", "inline-flex");
    }else {
        $("#rating").css("display", "none");
    }
})

class StarRating extends HTMLElement { 
    get value () {
        return this.getAttribute('value') || 0;
    }

    set value (val) {
        this.setAttribute('value', val);
        this.highlight(this.value - 1);
    }

    get number () {
        return this.getAttribute('number') || 10;
    }

    set number (val) {
        this.setAttribute('number', val);

        this.stars = [];

        while (this.firstChild) {
            this.removeChild(this.firstChild);
        }

        for (let i = 0; i < this.number; i++) {
            let s = document.createElement('div');
            s.className = 'star';
            this.appendChild(s);
            this.stars.push(s);
        }

        this.value = this.value;
    }

    highlight (index) {
        this.stars.forEach((star, i) => {
            star.classList.toggle('full', i <= index);
        });
    }

    constructor () {
        super();

        this.number = this.number;

        this.addEventListener('mousemove', e => {
            let box = this.getBoundingClientRect(),
                starIndex = Math.floor((e.pageX - box.left) / box.width * this.stars.length);

            this.highlight(starIndex);
        });

        this.addEventListener('mouseout', () => {
            this.value = this.value;
        });

        this.addEventListener('click', e => {
            let box = this.getBoundingClientRect(),
                starIndex = Math.floor((e.pageX - box.left) / box.width * this.stars.length);

            this.value = starIndex + 1;

            let rateEvent = new Event('rate');
            this.dispatchEvent(rateEvent);
        });
    }
}

customElements.define('x-star-rating', StarRating);

$('#rating').click(function(){
    var rate = rating.value;
    var vmid = $(".showMangaID").attr("mangaid");
    $.post("Controller/VoteHandle.php", {rate: rate, vmid: vmid}, function(data){
        if (data == "success") {
            $(".buttonVote").text("Voted : " + rate + " star(s)");
        }else if (data == "queryError") {
            alert("Query Error! Try again");
        }else {
            alert("Sign in to vote this manga!");
        }     
    });
    $("#rating").css("display", "none");
})