<div>
    <script>
        $('#searchsubmit').click(function (e) {
            exeAjax("{{ route('campaign.search') }}", e);
        });
        
        $(document).click(function (e) {
            hideSearchPanel();
        });
        
        $(document).scroll(function (e) {
            hideSearchPanel();
        });
        
        function hideSearchPanel(){
            $('#search-panel .search-content').removeClass('d-block').addClass('d-none');
            $('#search-campaign-main').val('');
        }

        // this function doesn't work for global keyupp proroperty.
        function delay(fn, ms) {
            let timer = 0;
            return function (...args) {
                clearTimeout(timer);
                timer = setTimeout(fn.bind(this, ...args), ms || 0);
            };
        }

        function exeAjax(uri, e) {
            $.ajax({
                type: 'get',
                url: uri,
                data: {
                    'q': $('#search-campaign-main').val()
                },
                success: function (data) {
                    let navTop = $('.navbar').offset().top;
                    $('#search-panel .search-content').offset({top : navTop});
                    $('#search-panel .search-content').removeClass('d-none').addClass('d-block');
                    $('#search-panel .search-content').empty();
                    $('#search-panel .search-content').append(data);
                }
            });
            e.stopPropagation();
        }
    </script>
</div>