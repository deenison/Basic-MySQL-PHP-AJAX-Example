+(function(window, document, $, undefined) {
    "use strict";

    $('#search-form').on('submit', function(e) {
        // Prevent event' default behavior.
        e.preventDefault();

        // Get the search input.
        var searchInput = $('#search-input');
        // Get the value from the input trimming spaces from both beginning and the end.
        var searchTerm = searchInput.val().trim();
        // Let's check if the user typed something.
        if (searchTerm.length > 0) {
            // Configure and send the ajax request.
            $.ajax({
                'url'   : "/handler-ajax.php",
                'method': "GET",
                'data'  : {
                    'term': searchTerm
                },
                // This event is executed before the request is sent.
                beforeSend: function(request, requestSettings) {
                    // Update the places where we show what the user is searching for.
                    $('code.search-term').text(searchTerm);
                    // Clean our output wrapper so we can append new results.
                    $('output').html('');
                },
                // This event is called if the request was able to be both sent and received by the url' (line 16) server.
                success : function(response, textStatus, request) {
                    if (response.results > 0) {
                        var listGroup = $('<ul class="list-group"></ul>');
                        for (var resultIndex = 0; resultIndex < response.results; resultIndex++) {
                            var result = response.data[resultIndex];
                            var listGroupItem = $('<li class="list-group-item"></li>');

                            listGroupItem.text(result.title);

                            var stateFlagImage = $('<img/>', {
                                'class': "pull-right flag",
                                'src'  : "/assets/images/flags/brazil/"+ result.alias +".png",
                                'alt'  : result.title,
                                'title': result.title
                            });
                            listGroupItem.append(stateFlagImage);
                            listGroup.append(listGroupItem);
                        }

                        // Append the results list to the output wrapper.
                        $('output').append(listGroup);
                    }

                    // Update the results counter.
                    $('.results-count').text(response.message);
                },
                // This event is called if something weird happened while the request was being sent or the server rejected the connection.
                error   : function(request, textStatus, errorThrown) {
                    alert('Some nasty error occurred. Check console for more info.');
                    console.error(errorThrown);
                },
                // This event is called every time regardless if the request succeeded or not.
                complete: function(request, textStatus) {
                    // do nothing for now.
                }
            });
        }

        // Force the browser to not submit the form.
        return false;
    });
})(window, document, jQuery);
