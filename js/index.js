    /**
     * Hides/displays the advanced search forms inputs.
     */
    function toggleAdvancedOptions() {
        document.getElementById('suggestion').innerHTML="";    
        const advancedSearchBtn = document.getElementsByClassName('advancedSearch')[0];
        const advancedSearchOptions = document.getElementsByClassName('advanced_option')[0];
        if (advancedSearchOptions.style.display == "none")
            advancedSearchOptions.style.display="block";
        else
            advancedSearchOptions.style.display="none";
    }
    /**
     * Select the suggested places from suggestion list 
     * @param {String} value 
     */
    function selectSuggestion(value) {
        document.getElementById('searchTxt').value = value; 
        document.getElementById('suggestion').innerHTML="";    
    }


    /**
     * Suggests places based on query.
     * also shows the complete list of places on click.
     */
    function suggestPlaces() {
        const searchTxt = document.getElementById('searchTxt').value;
        if (searchTxt!="") {
            const suggestionBox = document.getElementById('suggestion');
            const request = new HttpClient("http://localhost/RentalSurvey/autocomplete.php");
            request.get("?q="+searchTxt).then(function(response) {
                suggestionBox.innerHTML = "";
                for (i in response) {
                    suggestionBox.innerHTML += '<span onclick="selectSuggestion(this.innerHTML)">' + response[i] + '</span>'; 
                }
            });
        }
        else {
            document.getElementById('suggestion').innerHTML="";    
        }

    }
