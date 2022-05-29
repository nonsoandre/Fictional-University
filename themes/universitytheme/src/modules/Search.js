import $ from 'jquery';

class Search {
    //constructor function... any code within a constructor function will be executed as soon as an object is called
    // Area 1 - describe and create our object
    constructor(){
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

            this.typingTimer = setTimeout( this.getResults().bind(this), 2000);

        }

        //set search field result in element
        this.previousValue = this.searchField.val();
    }

    getResults() {
        this.resultsDiv.html('<div class="spinner-loader></div>');
        this.isSpinnerVisible = false ;
    }
}


export default Search;