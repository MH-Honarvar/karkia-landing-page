(function () {
            try {
                var t = localStorage.getItem('theme');
                if (t === 'dark' || (!t && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.setAttribute('data-theme', 'dark');
                }
                var q = new URLSearchParams(location.search).get('lang');
                if (q === 'en' || q === 'ru' || q === 'fa') localStorage.setItem('site_lang', q);
                var lang = localStorage.getItem('site_lang');
                if (lang === 'en' || lang === 'ru') {
                    document.documentElement.setAttribute('lang', lang);
                    document.documentElement.setAttribute('dir', 'ltr');
                } else if (lang === 'fa') {
                    document.documentElement.setAttribute('lang', 'fa');
                    document.documentElement.setAttribute('dir', 'rtl');
                }
            } catch (e) {}
        })();
    