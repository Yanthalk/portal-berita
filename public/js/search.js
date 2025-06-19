$(document).ready(function () {
    const searchInput = $('#search-input');
    const searchResults = $('#search-results');

    // Live search saat user mengetik
    searchInput.on('input', function () {
        const query = $(this).val().trim();

        if (query.length > 1) {
            $.ajax({
                url: '/search-berita',
                method: 'GET',
                data: { query: query },
                success: function (data) {
                    searchResults.empty();

                    if (data.length > 0) {
                        data.forEach(function (item) {
                            if (item.source === 'local') {
                                searchResults.append(`
                                    <a href="/berita/view/${item.id}" class="search-item">
                                        <div class="search-title">${item.judul}</div>
                                    </a>
                                `);
                            } else if (item.source === 'api') {
                                searchResults.append(`
                                    <a href="${item.url}" target="_blank" class="search-item">
                                        <div class="search-title">${item.judul}
                                            <span style="font-size: 12px; color: gray;"> (NewsAPI)</span>
                                        </div>
                                    </a>
                                `);
                            }
                        });

                        searchResults.show();
                    } else {
                        searchResults.html(`<div class="search-item">Tidak ditemukan</div>`);
                        searchResults.show();
                    }
                },
                error: function () {
                    searchResults.html(`<div class="search-item">Terjadi kesalahan saat mencari</div>`);
                    searchResults.show();
                }
            });
        } else {
            searchResults.hide();
        }
    });

    // Klik di luar area search → tutup hasil
    $(document).on('click', function (e) {
        if (!$(e.target).closest('.search-container').length) {
            searchResults.hide();
        }
    });

    // Klik pada hasil pencarian (menghindari konflik hide)
    searchResults.on('mousedown', 'a', function (e) {
        // Izinkan default action (link click)
        window.location.href = $(this).attr('href');
    });

    // Form submit normal saat tekan enter
    $('#search-form').on('submit', function (e) {
        const input = searchInput.val().trim();
        if (input.length === 0) {
            e.preventDefault();
        }
    });
});
