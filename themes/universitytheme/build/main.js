// alert('you are connected to this file');

 import $ from 'jquery';

class Search {
    //constructor function... any code within a constructor function will be executed as soon as an object is called
    // Area 1 - describe and create our object
    constructor(){
        //call this function to place all the html required.
        this.addSearchHTML();

        this.openButton = $(".js-search-trigger");
        this.closeButton = $('.search-overlay__close');
        this.searchOverlay = $('.search-overlay');
        this.resultsDiv = $('#search-overlay__results');
        
        this.searchField = $('.search-term');
        this.events();
        this.typingTimer;

        //stores overlay state
        this.isOverlayOpen = false;

        //spinnerstatetracker
        this.isSpinnerVisible = false;

        //tracking input value
        this.previousValue = false;
    }

    //2. Events
    //.bind(this) prevents jquery from changing the object pointer to remain consistent with the original <div> object
    events() {
        this.openButton.on('click', this.openOverlay.bind(this));
        this.closeButton.on('click', this.closeOverlay.bind(this));
        $(document).on('keydown', this.keyPressDispatcher.bind(this));

        this.searchField.on('keyup', this.typingLogic.bind(this));
    }

    //3. Methods
    openOverlay() {
        this.searchOverlay.addClass('search-overlay--active');
        $('body').addClass('body-no-scroll'); //stop body scroll during search
        
        // Focuses the input field. Thus users can start typing without clicking the the input field
        setTimeout(()=>{
           this.searchField.focus();
        }, 301); 

        this.searchField.val('');
        //set overlay state
        this.isOverlayOpen = true;
    }

    closeOverlay() {
        this.searchOverlay.removeClass('search-overlay--active');
        $('body').removeClass('body-no-scroll');

        //set overlay state
        this.isOverlayOpen = true;
    }

    keyPressDispatcher(e) {

        //opens the overlay by pressing the 's' key
        if (e.keycode == 83 && !this.isOverlayOpen && $('input, textarea').is(':focus') ){
            this.openOverlay();
        }

        if(e.keycode == 27 && this.isOverlayOpen && $('input, textarea').is(':focus')) {
            this.searchOverlay();
        }
    }

    typingLogic() {

        //compare previous value to current val
        if(this.searchField.val != this.previousValue){
        
            //wait a while before running events functions
            clearTimeout(this.typingTimer);


            if(this.searchField.val()){
                // Show spinner after results
                if( !this.isSpinnerVisible ) {
                    this.resultsDiv.html('<div class="spinner-loader></div>');
                    this.isSpinnerVisible = true;
                }

            }else{
                this.resultsDiv.html('');
                this.isSpinnerVisible = false;
            }

            this.typingTimer = setTimeout( this.getResults().bind(this), 750);

        }

        //set search field result in element
        this.previousValue = this.searchField.val();
    }

    getResults() {
//Asynchronous
        $.when(
            $.getJSON(universityData.root_url + '/wp-json/wp/v2/posts?search=' + this.searchField.val()),
            $.getJSON(universityData.root_url + '/wp-json/wp/v2/pages?search=' + this.searchField.val())
        ).then((posts, pages)=>{
            combinedResults = posts[0].concat(pages[0]);
            this.resultsDiv.html(`
                <h2 class="search-overlay__section-title">Search Header</h2> 

                ${combinedResults.length ? '<ul class="link-list min-list>' : '<p>No general information matches your search</p>'}
                    ${combinedResults.map(item => `<li><a href="${item.link}">${item.title.rendered}</a></li>`)}
                ${combinedResults.length ? '</ul>' : ''}
            
            `);
            this.isSpinnerVisible = false;
        }, ()=>{
            this.resultsDiv.html('<p>unexpected error please try again</p>')
        });
//Synchronous
        // $.getJSON(universityData.root_url + '/wp-json/wp/v2/posts?search=' + this.searchField.val(), (wp_data)=>{
        //     //arrow functions don't change the value of the this keyword

        //     this.resultsDiv.html(`
        //         <h2 class="search-overlay__section-title">Search Header</h2> 

        //         ${wp_data.length ? '<ul class="link-list min-list>' : '<p>No general information matches your search</p>'}
        //             ${wp_data.map(item => `<li><a href="${item.link}">${item.title.rendered}</a></li>`)}
        //         ${wp_data.length ? '</ul>' : ''}
            
        //     `);
        //     this.isSpinnerVisible = false;
        // });
    }

    addSearchHTML(){
        $('body').append(`
        <div class="search-overlay">
            <div class="search-overlay__top">
            <div class="container">
                <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
                <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term">
                <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
            </div>
            </div> 
            
            <div class="container">
                <div class="" id="search-overlay__results"></div>
            </div>
        </div>
        `);
    }
}


const search = new Search()