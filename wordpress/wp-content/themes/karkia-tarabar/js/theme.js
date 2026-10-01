const KTA_WA = (window.KTA && KTA.wa) || '989152444149';
        const KTA_MAIL = (window.KTA && KTA.mail) || 'Traffic@karkiatarabar.com';

        function openWhatsApp(text) {
            window.open('https://wa.me/' + KTA_WA + '?text=' + encodeURIComponent(text), '_blank', 'noopener,noreferrer');
        }
        function openMailto(subject, body) {
            window.location.href = 'mailto:' + KTA_MAIL + '?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(body);
        }

        let quoteMailSettled = false;
        let quoteMailTimeout = null;

        function setQuoteSendStatus(status) {
            const el = document.getElementById('quoteSendStatus');
            if (el) el.setAttribute('data-status', status);
            const fallbackRow = document.getElementById('quoteWhatsAppFallback');
            if (fallbackRow) fallbackRow.hidden = (status === 'sending');
        }

        function sendQuoteViaWhatsApp() {
            openWhatsApp(buildQuoteMessage());
        }

        function sendQuoteToCompanyEmail() {
            quoteMailSettled = false;
            setQuoteSendStatus('sending');
            clearTimeout(quoteMailTimeout);

            const ref = document.getElementById('hiddenTrackingCode').value || makeQuoteRef();
            const payload = {
                Quote_Ref: ref,
                Origin: document.getElementById('calcOrigin').value || '',
                Destination: document.getElementById('calcDest').value || '',
                Cargo: cargoLabel(),
                Weight: document.getElementById('sumWeight').innerText || document.getElementById('calcWeight').value || '',
                Phone: toAsciiDigits(document.getElementById('calcPhone').value || ''),
                Reply_Email: document.getElementById('calcEmail').value || '',
                Message: buildQuoteMessage()
            };

            if (window.KTA && KTA.ajax) {
                const body = new URLSearchParams();
                body.set('action', 'karkia_quote');
                body.set('nonce', KTA.nonce);
                Object.keys(payload).forEach((k) => body.set(k, payload[k]));
                fetch(KTA.ajax, { method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' }, body })
                    .then((r) => r.json())
                    .then((data) => {
                        if (quoteMailSettled) return;
                        quoteMailSettled = true;
                        setQuoteSendStatus(data && data.success ? 'sent' : 'fallback');
                    })
                    .catch(() => {
                        if (quoteMailSettled) return;
                        quoteMailSettled = true;
                        setQuoteSendStatus('fallback');
                    });
                quoteMailTimeout = setTimeout(() => {
                    if (quoteMailSettled) return;
                    quoteMailSettled = true;
                    setQuoteSendStatus('fallback');
                }, 12000);
                return;
            }

            const iframe = document.getElementById('ktaQuoteMail');
            const onLoad = () => {
                if (quoteMailSettled) return;
                quoteMailSettled = true;
                clearTimeout(quoteMailTimeout);
                iframe.removeEventListener('load', onLoad);
                setQuoteSendStatus('sent');
            };
            if (iframe) iframe.addEventListener('load', onLoad);
            quoteMailTimeout = setTimeout(() => {
                if (quoteMailSettled) return;
                quoteMailSettled = true;
                if (iframe) iframe.removeEventListener('load', onLoad);
                setQuoteSendStatus('fallback');
            }, 8000);

            const form = document.createElement('form');
            form.method = 'POST';
            form.action = 'https://formsubmit.co/' + KTA_MAIL;
            form.target = 'ktaQuoteMail';
            form.setAttribute('hidden', '');
            const fields = Object.assign({
                _subject: 'Karkia quote ' + ref,
                _template: 'table',
                _captcha: 'false',
                _honey: ''
            }, payload);
            Object.keys(fields).forEach((name) => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = name;
                input.value = fields[name];
                form.appendChild(input);
            });
            document.body.appendChild(form);
            form.submit();
            setTimeout(() => { if (form.parentNode) form.parentNode.removeChild(form); }, 3000);
        }
        function toAsciiDigits(str) {
            const fa = '۰۱۲۳۴۵۶۷۸۹';
            const ar = '٠١٢٣٤٥٦٧٨٩';
            return String(str || '').replace(/[۰-۹٠-٩]/g, (ch) => {
                const i = fa.indexOf(ch);
                if (i !== -1) return String(i);
                const j = ar.indexOf(ch);
                return j !== -1 ? String(j) : ch;
            });
        }
        function parseDimNumber(str) {
            const n = parseFloat(toAsciiDigits(str).replace(/[٫،,/]/g, '.'));
            return Number.isFinite(n) ? n : 0;
        }
        function readDimValues() {
            return {
                l: parseDimNumber(document.getElementById('dimL').value),
                w: parseDimNumber(document.getElementById('dimW').value),
                h: parseDimNumber(document.getElementById('dimH').value),
                qtyRaw: parseDimNumber(document.getElementById('dimQty').value)
            };
        }
        function sanitizeDimField(el, integerOnly) {
            const start = el.selectionStart;
            const origLen = el.value.length;
            let s = toAsciiDigits(el.value).replace(/[٫،,/]/g, '.');
            s = s.replace(/[^\d.]/g, '');
            if (integerOnly) {
                s = s.replace(/\./g, '');
            } else {
                const parts = s.split('.');
                s = parts[0] + (parts.length > 1 ? '.' + parts.slice(1).join('') : '');
            }
            if (s !== el.value) {
                el.value = s;
                if (typeof start === 'number') {
                    const pos = Math.max(0, start - (origLen - s.length));
                    try { el.setSelectionRange(pos, pos); } catch (e) {}
                }
            }
        }
        function makeQuoteRef() {
            const d = new Date();
            const pad = n => String(n).padStart(2, '0');
            return 'KTA-' + d.getFullYear() + pad(d.getMonth()+1) + pad(d.getDate());
        }
        function cargoLabel() {
            const cargo = document.querySelector('input[name="Cargo_Type"]:checked');
            if (!cargo) return '-';
            const lang = document.documentElement.getAttribute('lang') || 'fa';
            const t = cargo.closest('label') && cargo.closest('label').querySelector('.card-title.lang-' + lang);
            return t ? t.innerText.trim() : cargo.value;
        }
        function buildQuoteMessage() {
            const lang = document.documentElement.getAttribute('lang') || 'fa';
            const ref = document.getElementById('hiddenTrackingCode').value || makeQuoteRef();
            const lines = [
                lang === 'en' ? 'Freight quote request — Karkia Tarabar Asia' : (lang === 'ru' ? 'Заявка на расчет — Karkia Tarabar Asia' : 'درخواست استعلام کرایه — کارکیا ترابر آسیا'),
                (lang === 'fa' ? 'شماره ارجاع: ' : (lang === 'ru' ? 'Номер заявки: ' : 'Ref: ')) + ref,
                (lang === 'fa' ? 'مبدا: ' : (lang === 'ru' ? 'Откуда: ' : 'Origin: ')) + (document.getElementById('calcOrigin').value || '-'),
                (lang === 'fa' ? 'مقصد: ' : (lang === 'ru' ? 'Куда: ' : 'Destination: ')) + (document.getElementById('calcDest').value || '-'),
                (lang === 'fa' ? 'نوع کالا: ' : (lang === 'ru' ? 'Тип груза: ' : 'Cargo: ')) + cargoLabel(),
                (lang === 'fa' ? 'وزن/حجم: ' : (lang === 'ru' ? 'Вес/объем: ' : 'Weight/Vol: ')) + (document.getElementById('sumWeight').innerText || document.getElementById('calcWeight').value || '-'),
                (lang === 'fa' ? 'تلفن: ' : (lang === 'ru' ? 'Телефон: ' : 'Phone: ')) + toAsciiDigits(document.getElementById('calcPhone').value || '-'),
                (lang === 'fa' ? 'ایمیل: ' : (lang === 'ru' ? 'Email: ' : 'Email: ')) + (document.getElementById('calcEmail').value || '-')
            ];
            return lines.join('\n');
        }

        function loadScript(src) {
            return new Promise((resolve, reject) => {
                const s = document.createElement('script');
                s.src = src;
                s.async = true;
                s.onload = resolve;
                s.onerror = reject;
                document.head.appendChild(s);
            });
        }

        let echartsLoadPromise = null;
        function ensureEchartsLoaded() {
            if (typeof echarts !== 'undefined') return Promise.resolve();
            if (echartsLoadPromise) return echartsLoadPromise;
            echartsLoadPromise = loadScript((window.KTA && KTA.uri ? KTA.uri : '') + '/assets/vendor/echarts.min.js')
                .then(() => loadScript((window.KTA && KTA.uri ? KTA.uri : '') + '/assets/vendor/world.js'));
            return echartsLoadPromise;
        }

        function setupLazyMap() {
            const mapEl = document.getElementById('echarts-map') || document.getElementById('route-map');
            if (!mapEl) return;
            const observer = new IntersectionObserver((entries) => {
                if (!entries.some(e => e.isIntersecting)) return;
                observer.disconnect();
                ensureEchartsLoaded()
                    .then(() => { if (typeof initInteractiveMap === 'function') initInteractiveMap(); })
                    .catch(() => {});
            }, { rootMargin: '200px 0px', threshold: 0.01 });
            observer.observe(mapEl);
        }

        function isCompactCubeViewport() {
            return window.innerWidth <= 1100 || (window.matchMedia('(pointer: coarse)').matches && window.innerWidth <= 1366);
        }

        function canUseThreeCube() {
            if (navigator.connection && navigator.connection.saveData) return false;
            if (isCompactCubeViewport()) return false;
            try {
                const canvas = document.createElement('canvas');
                return !!(canvas.getContext('webgl') || canvas.getContext('experimental-webgl'));
            } catch (e) {
                return false;
            }
        }

        let threeLoadPromise = null;
        function ensureThreeLoaded() {
            if (!canUseThreeCube()) return Promise.reject(new Error('three-unavailable'));
            if (typeof THREE !== 'undefined' && THREE.OrbitControls) return Promise.resolve();
            if (threeLoadPromise) return threeLoadPromise;
            threeLoadPromise = loadScript((window.KTA && KTA.uri ? KTA.uri : '') + '/assets/vendor/three.min.js')
                .then(() => loadScript((window.KTA && KTA.uri ? KTA.uri : '') + '/assets/vendor/OrbitControls.js'))
                .catch(err => { threeLoadPromise = null; throw err; });
            return threeLoadPromise;
        }

        function setupLazyThree() {
            const calc = document.getElementById('freight-calculator');
            if (!calc || !canUseThreeCube()) return;
            const observer = new IntersectionObserver((entries) => {
                if (!entries.some(e => e.isIntersecting)) return;
                observer.disconnect();
                ensureThreeLoaded().catch(() => {});
            }, { rootMargin: '200px 0px', threshold: 0.01 });
            observer.observe(calc);
        }

        // 🛡️ SECURITY: Input Sanitization Function
        const sanitizeInput = (str) => {
            if(!str) return "";
            return str.replace(/</g, "&lt;").replace(/>/g, "&gt;");
        };

        // 📱 Mobile Menu Functionality
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navLinks = document.getElementById('navLinks');

        function syncMenuAria() {
            const open = navLinks && navLinks.classList.contains('show');
            if (mobileMenuBtn) {
                mobileMenuBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
            }
        }
        if(mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', () => { navLinks.classList.toggle('show'); syncMenuAria(); });
        }
        function closeMobileMenu() {
            if(navLinks && navLinks.classList.contains('show')) { navLinks.classList.remove('show'); syncMenuAria(); }
        }
        document.addEventListener('click', (e) => {
            if (!navLinks || !navLinks.classList.contains('show')) return;
            if (mobileMenuBtn && (mobileMenuBtn.contains(e.target) || navLinks.contains(e.target))) return;
            closeMobileMenu();
        });

        // --- 1. Interactive Map Logic ---
        let echartMapInstance = null;
        const mapCoords = { 'Iran': [53.6880, 32.4279], 'China': [104.1954, 35.8617], 'UAE': [53.8478, 23.4241], 'Oman': [55.9233, 21.5126], 'Uzbekistan': [64.5853, 41.3775], 'Tajikistan': [71.2761, 38.8610], 'Turkmenistan': [59.5563, 38.9697], 'Afghanistan': [67.7100, 33.9391], 'Mersin (Turkey)': [34.6415, 36.8121] };
        
        const destinationData = [
            { name: 'China', value: mapCoords['China'], infoFA: 'نمایندگان تجاری فعال، تامین و ترخیص کالا', infoEN: 'Active Commercial Agents, Sourcing & Clearance', infoRU: 'Активные коммерческие агенты, снабжение и оформление' },
            { name: 'UAE', value: mapCoords['UAE'], infoFA: 'دفتر فعال در امارات، تسریع عملیات لجستیکی', infoEN: 'Active UAE Office, Accelerated Logistics', infoRU: 'Активный офис в ОАЭ, ускоренная логистика' },
            { name: 'Oman', value: mapCoords['Oman'], infoFA: 'دفتر فعال در عمان، لجستیک بحران', infoEN: 'Active Oman Office, Crisis Logistics', infoRU: 'Активный офис в Омане, антикризисная логистика' },
            { name: 'Uzbekistan', value: mapCoords['Uzbekistan'], infoFA: 'لجستیک جاده‌ای و ریلی', infoEN: 'Road and Rail Logistics', infoRU: 'Автомобильная и железнодорожная логистика' },
            { name: 'Tajikistan', value: mapCoords['Tajikistan'], infoFA: 'خدمات ترانزیت و دسترسی منطقه‌ای', infoEN: 'Transit & Regional Access', infoRU: 'Транзитные услуги и региональный доступ' },
            { name: 'Turkmenistan', value: mapCoords['Turkmenistan'], infoFA: 'کریدور ترانزیتی', infoEN: 'Transit Corridor', infoRU: 'Транзитный коридор' },
            { name: 'Afghanistan', value: mapCoords['Afghanistan'], infoFA: 'ترانزیت جاده‌ای و دسترسی منطقه‌ای', infoEN: 'Road Transit & Regional Access', infoRU: 'Автомобильный транзит и региональный доступ' },
            { name: 'Mersin (Turkey)', value: mapCoords['Mersin (Turkey)'], infoFA: 'هاب ترانزیت به اروپا', infoEN: 'Transit Hub to Europe', infoRU: 'Транзитный узел в Европу' }
        ];
        const mapRoutes = destinationData.map(item => ({ coords: [mapCoords['Iran'], item.value] }));

        const themeBtn = document.getElementById('themeBtn');
        const themeIcon = themeBtn ? themeBtn.querySelector('i') : null;
        const currentTheme = localStorage.getItem('theme') || (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light");
        
        if (currentTheme === 'dark' && themeIcon) { document.documentElement.setAttribute('data-theme', 'dark'); themeIcon.classList.replace('fa-moon', 'fa-sun'); }

        if (themeBtn && themeIcon) themeBtn.addEventListener('click', () => {
            let theme = document.documentElement.getAttribute('data-theme');
            if (theme === 'dark') { document.documentElement.removeAttribute('data-theme'); localStorage.setItem('theme', 'light'); themeIcon.classList.replace('fa-sun', 'fa-moon'); } 
            else { document.documentElement.setAttribute('data-theme', 'dark'); localStorage.setItem('theme', 'dark'); themeIcon.classList.replace('fa-moon', 'fa-sun'); }
            if (typeof window.applyMapTheme === 'function') window.applyMapTheme();
        });

        window.applyMapTheme = function() {
            if(!echartMapInstance) return;
            const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
            var dotColor = isDark ? '#e5c05c' : '#d35400';
            echartMapInstance.setOption({
                tooltip: { backgroundColor: isDark ? 'rgba(4, 17, 31, 0.9)' : 'rgba(255, 255, 255, 0.9)', textStyle: { color: isDark ? '#fff' : '#1f2937' } },
                geo: { itemStyle: { areaColor: isDark ? '#0a172a' : '#e2e8f0', borderColor: isDark ? '#1e293b' : '#cbd5e1' }, emphasis: { itemStyle: { areaColor: isDark ? '#0d3256' : '#94a3b8' } } },
                series: [ { effect: { color: dotColor }, lineStyle: { color: isDark ? '#00a8a8' : '#0d3256', opacity: isDark ? 0.4 : 0.7 } }, { label: { color: isDark ? '#fff' : '#1f2937' }, itemStyle: { color: dotColor, shadowColor: isDark ? dotColor : 'transparent' } } ]
            });
        };

        function initInteractiveMap() {
            try {
                if (typeof echarts === 'undefined') return;
                var chartDom = document.getElementById('echarts-map'); if(!chartDom) return;
                if (echartMapInstance) return;
                echartMapInstance = echarts.init(chartDom);
                var isDark = document.documentElement.getAttribute('data-theme') === 'dark';
                var dotColor = isDark ? '#e5c05c' : '#d35400';
                var isPhoneMap = window.innerWidth <= 640;
                var isCompactMap = window.innerWidth <= 1100 || (window.matchMedia('(pointer: coarse)').matches && window.innerWidth <= 1366);
                var isZoomedMap = isPhoneMap || isCompactMap;
                var scatterPoints = [
                    { name: isZoomedMap ? 'Iran' : 'Iran (HQ)', value: mapCoords['Iran'], itemStyle: { color: isDark ? '#00a8a8' : '#0d3256' }, label: { color: isDark ? '#00a8a8' : '#0d3256', position: isZoomedMap ? 'bottom' : 'right' } }
                ].concat(destinationData.map(function (item) {
                    if (!isZoomedMap) return item;
                    var shortName = item.name === 'Mersin (Turkey)' ? 'Mersin' : item.name;
                    var pos = 'right';
                    if (item.name === 'UAE' || item.name === 'Oman' || item.name === 'Mersin (Turkey)') pos = 'left';
                    if (item.name === 'Uzbekistan') pos = 'top';
                    if (item.name === 'Turkmenistan') pos = 'bottom';
                    return Object.assign({}, item, { name: shortName, label: { position: pos } });
                }));

                var option = {
                    backgroundColor: 'transparent',
                    tooltip: { trigger: 'item', backgroundColor: isDark ? 'rgba(4, 17, 31, 0.9)' : 'rgba(255, 255, 255, 0.9)', borderColor: '#00a8a8', formatter: function (p) { if(p.seriesType === 'effectScatter') { const lang = document.documentElement.getAttribute('lang'); const name = p.data.name; if(lang==='en') return `<div style="text-align: left; direction: ltr; font-family: 'Inter', sans-serif;"><strong style="color: #e5c05c;">${name}</strong></div>`; else if (lang==='ru') return `<div style="text-align: left; direction: ltr; font-family: 'Inter', sans-serif;"><strong style="color: #e5c05c;">${name}</strong></div>`; else return `<div style="text-align: right; direction: rtl; font-family: 'Vazirmatn', sans-serif;"><strong style="color: #e5c05c;">${name}</strong></div>`; } return ''; } },
                    geo: { map: 'world', zoom: isZoomedMap ? 4.05 : 2.45, center: isZoomedMap ? [63, 32.3] : [68, 32.5], roam: !isCompactMap, itemStyle: { areaColor: isDark ? '#0a172a' : '#e2e8f0', borderColor: isDark ? '#1e293b' : '#cbd5e1', borderWidth: 1 }, emphasis: { itemStyle: { areaColor: isDark ? '#0d3256' : '#94a3b8' }, label: { show: false } } },
                    series: [ { type: 'lines', zlevel: 1, effect: { show: true, period: 4, trailLength: 0.6, color: dotColor, symbolSize: isZoomedMap ? 3 : 4 }, lineStyle: { color: isDark ? '#00a8a8' : '#0d3256', width: isZoomedMap ? 1.2 : 1.5, opacity: isDark ? 0.4 : 0.7, curveness: 0.2 }, data: mapRoutes }, { type: 'effectScatter', coordinateSystem: 'geo', zlevel: 2, rippleEffect: { brushType: 'stroke', scale: isZoomedMap ? 2.4 : 4 }, label: { show: true, position: 'right', formatter: '{b}', color: isDark ? '#fff' : '#1f2937', fontSize: isPhoneMap ? 9 : (isZoomedMap ? 10 : 12), fontWeight: 'bold' }, itemStyle: { color: dotColor, shadowBlur: 10, shadowColor: isDark ? dotColor : 'transparent' }, data: scatterPoints } ]
                };

                echartMapInstance.setOption(option);
                window.addEventListener('resize', () => echartMapInstance.resize());
            } catch(e) {}
        }

        // --- 2. Advanced Autocomplete Engine ---
        const popularLocations = [
            "بندرعباس / شهید رجایی (Bandar Abbas - Rajaee)", "بندرعباس / شهید باهنر (Bandar Abbas - Bahonar)", "بندر امام خمینی (B.I.K)", "چابهار / شهید بهشتی (Chabahar)", "بندر بوشهر (Bushehr)", "بندر خرمشهر (Khorramshahr)", "بندر لنگه (Bandar Lengeh)", "جزیره قشم (Qeshm Island)", "جزیره کیش (Kish Island)", "بندر انزلی (Anzali Port)", "بندر امیرآباد (Amirabad)", "بندر نوشهر (Noshahr)", "بندر کاسپین (Caspian Port)", "بندر آستارا (Astara Port)",
            "مرز بازرگان - ترکیه (Bazargan)", "مرز رازی - ترکیه (Razi)", "مرز سرو - ترکیه (Serow)", "مرز باشماق - عراق (Bashmaq)", "مرز پرویزخان - عراق (Parvizkhan)", "مرز مهران - عراق (Mehran)", "مرز شلمچه - عراق (Shalamcheh)", "مرز چذابه - عراق (Chazzabeh)", "مرز خسروی - عراق (Khosravi)", "مرز سومار - عراق (Sumar)", "مرز تمرچین - عراق (Tamarchin)", "مرز کیله سردشت - عراق (Kileh)", "مرز دوغارون - افغانستان (Dogharoon)", "مرز میلک - افغانستان (Milak)", "مرز ماهیرود - افغانستان (Mahirud)", "مرز میرجاوه - پاکستان (Mirjaveh)", "مرز پیشین - پاکستان (Pishin)", "مرز ریمدان - پاکستان (Rimdan)", "مرز سرخس - ترکمنستان (Sarakhs)", "مرز اینچه‌برون - ترکمنستان (Incheh Borun)", "مرز لطف‌آباد - ترکمنستان (Lotfabad)", "مرز باجگیران - ترکمنستان (Bajgiran)", "مرز نوردوز - ارمنستان (Norduz)", "مرز جلفا - آذربایجان (Jolfa)", "مرز بیله‌سوار - آذربایجان (Bileh Savar)", "مرز پلدشت - آذربایجان (Poldasht)", "مرز آستارا - آذربایجان (Astara Border)",
            "شانگهای - چین (Shanghai)", "شنزن - چین (Shenzhen)", "گوانگژو - چین (Guangzhou)", "نینگبو - چین (Ningbo)", "چینگدائو - چین (Qingdao)", "تیانجین - چین (Tianjin)", "جبل علی / دبی - امارات (Jebel Ali / Dubai)", "ابوظبی - امارات (Abu Dhabi)", "شارجه - امارات (Sharjah)", "صحار - عمان (Sohar)", "مسقط - عمان (Muscat)", "صلاله - عمان (Salalah)", "استانبول - ترکیه (Istanbul)", "مرسین - ترکیه (Mersin)", "ازمیر - ترکیه (Izmir)",
            "تاشکند - ازبکستان (Tashkent)", "سمرقند - ازبکستان (Samarkand)", "بخارا - ازبکستان (Bukhara)", "اندیجان - ازبکستان (Andijan)", "فرغانه - ازبکستان (Fergana)", "ترمذ - ازبکستان (Termez)", "نوایی - ازبکستان (Navoi)", "دوشنبه - تاجیکستان (Dushanbe)", "خجند - تاجیکستان (Khujand)", "عشق‌آباد - ترکمنستان (Ashgabat)", "ترکمن‌باشی - ترکمنستان (Turkmenbashi)", "مرو - ترکمنستان (Mary)", "آلماتی - قزاقستان (Almaty)", "آستانه - قزاقستان (Astana)", "شیمکنت - قزاقستان (Shymkent)", "آکتائو - قزاقستان (Aktau)", "بیشکک - قرقیزستان (Bishkek)", "اوش - قرقیزستان (Osh)", "کابل - افغانستان (Kabul)", "هرات - افغانستان (Herat)", "مزارشریف - افغانستان (Mazar-i-Sharif)", "قندهار - افغانستان (Kandahar)", "کراچی - پاکستان (Karachi)", "بمبئی / ناواشیوا - هند (Mumbai / Nhava Sheva)", "موندرا - هند (Mundra)", "سنگاپور (Singapore)", "هامبورگ - آلمان (Hamburg)", "روتردام - هلند (Rotterdam)", "آنتورپ - بلژیک (Antwerp)", "جنووا - ایتالیا (Genoa)",
            "تهران (Tehran)", "کرج (Karaj)", "مشهد (Mashhad)", "اصفهان (Isfahan)", "شیراز (Shiraz)", "تبریز (Tabriz)", "اهواز (Ahvaz)", "قم (Qom)", "کرمانشاه (Kermanshah)", "ارومیه (Urmia)", "رشت (Rasht)", "زاهدان (Zahedan)", "همدان (Hamedan)", "کرمان (Kerman)", "یزد (Yazd)", "اردبیل (Ardabil)", "اراک (Arak)", "زنجان (Zanjan)", "سنندج (Sanandaj)", "قزوین (Qazvin)", "خرم‌آباد (Khorramabad)", "گرگان (Gorgan)", "ساری (Sari)", "بوشهر (Bushehr City)", "ایلام (Ilam)", "بندرعباس (Bandar Abbas City)", "کاشان (Kashan)", "نیشابور (Neyshabur)", "دزفول (Dezful)", "آبادان (Abadan)", "ماهشهر (Mahshahr)", "ساوه (Saveh)", "آمل (Amol)", "سیرجان (Sirjan)", "چابهار (Chabahar City)"
        ];

        const locationHubHints = ['بازرگان', 'شلمچه', 'مهران', 'دوغارون', 'میرجاوه', 'سرخس', 'جلفا', 'رجایی', 'امام خمینی', 'چابهار', 'جبل علی', 'مرسین', 'تهران', 'مشهد', 'اصفهان', 'بندرعباس', 'تبریز', 'اهواز', 'تاشکند', 'دوشنبه', 'عشق‌آباد', 'آلماتی', 'آستانه', 'بیشکک', 'کابل', 'هرات', 'bazargan', 'shalamcheh', 'mehran', 'tashkent', 'dushanbe', 'ashgabat', 'almaty', 'astana', 'bishkek', 'kabul', 'herat', 'tehran', 'mashhad', 'isfahan', 'tabriz', 'ahvaz', 'bandar abbas'];

        function scoreLocation(query, loc) {
            const q = (query || '').trim().toLowerCase();
            const s = loc.toLowerCase();
            const faName = loc.split('(')[0].trim().toLowerCase();
            const enMatch = loc.match(/\(([^)]+)\)/);
            const enName = enMatch ? enMatch[1].toLowerCase() : '';
            let score = 0;

            if (faName === q || s === q) score += 120;
            else if (faName.indexOf(q) === 0) score += 90;
            else if (enName.indexOf(q) === 0) score += 75;
            else if (s.indexOf(q) !== -1) score += 25;

            const isBorder = s.indexOf('مرز') !== -1 || s.indexOf('border') !== -1 || s.indexOf('گمرک') !== -1 || s.indexOf('customs') !== -1;
            const isPort = s.indexOf('بندر') !== -1 || s.indexOf('port') !== -1 || s.indexOf('جزیره') !== -1;
            if (isBorder) score += 12;
            else if (isPort) score += 8;

            for (let i = 0; i < locationHubHints.length; i++) {
                if (s.indexOf(locationHubHints[i]) !== -1) { score += 18; break; }
            }

            if (q.indexOf('مرز') === 0 || q.indexOf('border') === 0 || q.indexOf('گمرک') === 0) {
                if (isBorder) score += 40;
            } else if (q.indexOf('بندر') === 0 || q.indexOf('port') === 0) {
                if (isPort) score += 40;
            }

            return score;
        }

        function setupAutocomplete(inputEl, listEl) {
            let currentFocus = -1;
            inputEl.addEventListener('input', function() {
                const val = this.value.trim().toLowerCase();
                listEl.innerHTML = ''; currentFocus = -1;
                if (!val) { listEl.style.display = 'none'; return; }
                const matches = popularLocations.filter(loc => loc.toLowerCase().includes(val))
                    .sort(function (a, b) {
                        const sa = scoreLocation(val, a);
                        const sb = scoreLocation(val, b);
                        if (sb !== sa) return sb - sa;
                        return a.localeCompare(b, 'fa');
                    })
                    .slice(0, 50);
                if (matches.length === 0) { listEl.style.display = 'none'; return; }
                matches.forEach((match) => {
                    const item = document.createElement('div');
                    item.innerText = match;
                    item.addEventListener('click', function() { inputEl.value = match; listEl.style.display = 'none'; saveCalcProgress(); updateSummaryRealtime(); });
                    listEl.appendChild(item);
                });
                listEl.style.display = 'block';
            });

            inputEl.addEventListener('keydown', function(e) {
                let items = listEl.getElementsByTagName('div');
                if (listEl.style.display === 'block') {
                    if (e.keyCode === 40) { currentFocus++; addActive(items); } 
                    else if (e.keyCode === 38) { currentFocus--; addActive(items); } 
                    else if (e.keyCode === 13) { e.preventDefault(); if (currentFocus > -1 && items) items[currentFocus].click(); }
                }
            });

            function addActive(x) {
                if (!x) return false; removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                x[currentFocus].classList.add("autocomplete-active");
                x[currentFocus].scrollIntoView({ block: "nearest", behavior: "smooth" });
            }
            function removeActive(x) { for (let i = 0; i < x.length; i++) x[i].classList.remove("autocomplete-active"); }
            document.addEventListener('click', function(e) { if (e.target !== inputEl) listEl.style.display = 'none'; });
        }

        // --- 3. Smart Calculator Web-App Logic ---
        const formSteps = document.querySelectorAll('.form-step');
        const progressSteps = document.querySelectorAll('.step');
        const progressLine = document.getElementById('progressLine');
        const progressTruck = document.getElementById('progressTruck');
        const nextBtns = document.querySelectorAll('.btn-next');
        const prevBtns = document.querySelectorAll('.btn-prev');
        const multiStepForm = document.getElementById('multiStepForm');
        let currentStep = 0;

        function saveCalcProgress() {
            try {
                const checkedCargo = document.querySelector('input[name="Cargo_Type"]:checked');
                const data = {
                    origin: document.getElementById('calcOrigin').value, dest: document.getElementById('calcDest').value,
                    weight: document.getElementById('calcWeight').value, cbmMode: document.getElementById('cbmCalculatorBox').classList.contains('active'),
                    cargo: checkedCargo ? checkedCargo.value : ''
                };
                localStorage.setItem('karkia_calc_progress', JSON.stringify(data));
            } catch(e) {}
        }

        function loadCalcProgress() {
            try {
                const data = JSON.parse(localStorage.getItem('karkia_calc_progress'));
                if(data) {
                    if(data.origin) document.getElementById('calcOrigin').value = data.origin;
                    if(data.dest) document.getElementById('calcDest').value = data.dest;
                    if(data.weight) { document.getElementById('calcWeight').value = data.weight; document.getElementById('weightRangeSlider').value = data.weight; }
                    if(data.cargo) { const r = document.querySelector(`input[name="Cargo_Type"][value="${data.cargo}"]`); if(r) r.checked = true; }
                    if(data.cbmMode) { document.getElementById('cbmToggleBtn').click(); }
                    updateSummaryRealtime(); runSmartEngine();
                }
            } catch(e) {}
        }
        function restoreCalcProgress() { loadCalcProgress(); }

        // 🚨 FIX: Reset Form Properly
        function resetCalculatorUI() {
            multiStepForm.reset();
            currentStep = 0;
            updateFormSteps();
            updateProgressbar();
            
            // Reset CBM
            if(document.getElementById('cbmCalculatorBox').classList.contains('active')) {
                document.getElementById('cbmToggleBtn').click(); 
            }
            document.getElementById('cbmTotalVal').innerText = "0.00";
            document.getElementById('hiddenCbm').value = "0";
            if (typeof updateThreeJSCube === 'function') updateThreeJSCube(100, 100, 100);
            
            // Reset Sliders & Cards
            document.getElementById('weightRangeSlider').value = 20;
            document.getElementById('smartEquipmentBox').classList.remove('active');
            
            localStorage.removeItem('karkia_calc_progress');
            const submitBtn = document.getElementById('finalSubmitBtn');
            if (submitBtn) submitBtn.disabled = false;
            clearTimeout(quoteMailTimeout);
            quoteMailSettled = false;
            setQuoteSendStatus('sending');
            const quoteWaFallback = document.getElementById('quoteWhatsAppFallback');
            if (quoteWaFallback) quoteWaFallback.hidden = true;
            updateSummaryRealtime();
        }

        function updateSummaryRealtime() {
            const sBox = document.getElementById('floatingSummary');
            if(currentStep === 0 || currentStep === 3) { sBox.classList.remove('visible'); return; }
            sBox.classList.add('visible');
            
            const ori = document.getElementById('calcOrigin').value || '-';
            const des = document.getElementById('calcDest').value || '-';
            document.getElementById('sumOrigin').innerText = ori.split('(')[0].trim() || '-';
            document.getElementById('sumDest').innerText = des.split('(')[0].trim() || '-';
            
            document.getElementById('sumCargo').innerText = cargoLabel();
            const lang = document.documentElement.getAttribute('lang') || 'fa';
            const tonUnit = lang === 'fa' ? ' تن' : (lang === 'ru' ? ' т' : ' t');
            if(document.getElementById('cbmCalculatorBox').classList.contains('active')) {
                const cbmRaw = parseFloat(document.getElementById('hiddenCbm').value);
                document.getElementById('sumWeight').innerText = (isFinite(cbmRaw) ? cbmRaw.toFixed(2) : '0.00') + ' CBM';
            } else {
                document.getElementById('sumWeight').innerText = document.getElementById('calcWeight').value ? document.getElementById('calcWeight').value + tonUnit : '-';
            }
        }

        // CBM 3D Engine Setup (Three.js primary + CSS cube fallback)
        const cbmToggleBtn = document.getElementById('cbmToggleBtn');
        const cbmCalculatorBox = document.getElementById('cbmCalculatorBox');
        const cbmChevron = document.getElementById('cbmChevron');
        let cbmActive = false;
        let cbmScene, cbmCamera, cbmRenderer, cbmMesh, cbmEdges, cbmControls;
        let cbmAnimating = false;

        function keepCssCube() {
            const container = document.getElementById('three-cbm-container');
            if (container) container.classList.remove('three-ready');
            stopCbmAnimation();
        }

        function startCbmAnimation() {
            if (cbmAnimating || !cbmRenderer) return;
            cbmAnimating = true;
            function animate() {
                if (!cbmAnimating) return;
                requestAnimationFrame(animate);
                if (cbmControls) cbmControls.update();
                cbmRenderer.render(cbmScene, cbmCamera);
            }
            animate();
        }

        function stopCbmAnimation() {
            cbmAnimating = false;
        }

        function initThreeJS() {
            const container = document.getElementById('three-cbm-container');
            if (!container || typeof THREE === 'undefined') {
                keepCssCube();
                return;
            }
            if (cbmRenderer) {
                container.classList.add('three-ready');
                startCbmAnimation();
                const d = readDimValues();
                updateThreeJSCube(d.l, d.w, d.h);
                return;
            }

            const initialWidth = container.clientWidth || 300;
            const initialHeight = container.clientHeight || 280;

            cbmScene = new THREE.Scene();
            cbmCamera = new THREE.PerspectiveCamera(45, initialWidth / initialHeight, 0.1, 1000);
            cbmCamera.position.set(3.5, 3.5, 4.5);

            cbmRenderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
            cbmRenderer.setSize(initialWidth, initialHeight);
            cbmRenderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
            container.appendChild(cbmRenderer.domElement);

            const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (THREE.OrbitControls) {
                cbmControls = new THREE.OrbitControls(cbmCamera, cbmRenderer.domElement);
                cbmControls.enableZoom = true;
                cbmControls.enablePan = false;
                cbmControls.autoRotate = !prefersReduced;
                cbmControls.autoRotateSpeed = 2.5;
                cbmControls.enableDamping = true;
                cbmControls.dampingFactor = 0.05;
                cbmControls.target.set(0, 0, 0);
            }

            const geometry = new THREE.BoxGeometry(1, 1, 1);
            const material = new THREE.MeshBasicMaterial({ color: 0x00a8a8, transparent: true, opacity: 0.3, side: THREE.DoubleSide });
            cbmMesh = new THREE.Mesh(geometry, material);
            cbmScene.add(cbmMesh);

            const edgesGeo = new THREE.EdgesGeometry(geometry);
            const edgesMat = new THREE.LineBasicMaterial({ color: 0xe5c05c, linewidth: 2 });
            cbmEdges = new THREE.LineSegments(edgesGeo, edgesMat);
            cbmMesh.add(cbmEdges);

            if (typeof ResizeObserver !== 'undefined') {
                const resizeObserver = new ResizeObserver(entries => {
                    for (let entry of entries) {
                        const { width, height } = entry.contentRect;
                        if (width > 0 && height > 0 && cbmCamera && cbmRenderer) {
                            cbmCamera.aspect = width / height;
                            cbmCamera.updateProjectionMatrix();
                            cbmRenderer.setSize(width, height);
                        }
                    }
                });
                resizeObserver.observe(container);
            }

            container.classList.add('three-ready');
            startCbmAnimation();

            const d = readDimValues();
            updateThreeJSCube(d.l, d.w, d.h);
        }

        function updateThreeJSCube(l, w, h) {
            if (!cbmMesh) return;
            const validL = l > 0 ? l : 100;
            const validW = w > 0 ? w : 100;
            const validH = h > 0 ? h : 100;
            const maxVal = Math.max(validL, validW, validH);
            const scaleFactor = 2.5 / maxVal;
            cbmMesh.scale.set(validL * scaleFactor, validH * scaleFactor, validW * scaleFactor);
        }

        if(cbmToggleBtn) {
            cbmToggleBtn.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); cbmToggleBtn.click(); }
            });
            cbmToggleBtn.addEventListener('click', () => {
                cbmActive = !cbmActive;
                cbmCalculatorBox.classList.toggle('active', cbmActive);
                cbmToggleBtn.setAttribute('aria-expanded', cbmActive ? 'true' : 'false');
                cbmChevron.style.transform = cbmActive ? 'rotate(180deg)' : 'rotate(0)';
                if(cbmActive) {
                    document.getElementById('calcWeight').removeAttribute('required');
                    ['dimL', 'dimW', 'dimH'].forEach(id => document.getElementById(id).setAttribute('required', 'true'));
                    ensureThreeLoaded()
                        .then(() => { setTimeout(() => { if (cbmActive) initThreeJS(); }, 100); })
                        .catch(() => keepCssCube());
                } else {
                    document.getElementById('calcWeight').setAttribute('required', 'true');
                    ['dimL', 'dimW', 'dimH'].forEach(id => document.getElementById(id).removeAttribute('required'));
                    stopCbmAnimation();
                }
                saveCalcProgress(); updateSummaryRealtime(); runSmartEngine();
            });

            ['dimL', 'dimW', 'dimH', 'dimQty'].forEach(id => {
                const dimEl = document.getElementById(id);
                dimEl.addEventListener('input', () => {
                    sanitizeDimField(dimEl, id === 'dimQty');
                    const d = readDimValues();
                    const qty = d.qtyRaw > 0 ? d.qtyRaw : 1;
                    const cbm = (d.l * d.w * d.h) / 1000000 * qty;
                    document.getElementById('cbmTotalVal').innerText = cbm.toFixed(2);
                    document.getElementById('hiddenCbm').value = cbm.toFixed(2);
                    if (cbmMesh) updateThreeJSCube(d.l, d.w, d.h);
                    saveCalcProgress(); updateSummaryRealtime(); runSmartEngine();
                });
                dimEl.addEventListener('keydown', (e) => {
                    if (e.key !== 'ArrowUp' && e.key !== 'ArrowDown') return;
                    e.preventDefault();
                    const base = parseDimNumber(dimEl.value);
                    const next = Math.max(0, base + (e.key === 'ArrowUp' ? 1 : -1));
                    dimEl.value = String(next);
                    dimEl.dispatchEvent(new Event('input', { bubbles: true }));
                });
            });
        }

        // Smart Equipment Engine
        function runSmartEngine() {
            const isCbmMode = cbmCalculatorBox.classList.contains('active');
            const weight = isCbmMode ? 0 : (parseInt(document.getElementById('calcWeight').value, 10) || 0);
            const cbm = isCbmMode ? (parseFloat(document.getElementById('hiddenCbm').value) || 0) : 0;
            const cargoTypeInput = document.querySelector('input[name="Cargo_Type"]:checked');
            
            if(!cargoTypeInput && !weight && !cbm) return;
            
            const type = cargoTypeInput ? cargoTypeInput.value : '';
            const equipBox = document.getElementById('smartEquipmentBox');
            const textFa = document.getElementById('smartEquipmentTextFa');
            const textEn = document.getElementById('smartEquipmentTextEn');
            const textRu = document.getElementById('smartEquipmentTextRu');
            const icon = document.getElementById('equipIcon');
            const hiddenVal = document.getElementById('hiddenEquip');
            
            let suggestionFa = ""; let suggestionEn = ""; let suggestionRu = ""; let iconClass = "fa-solid fa-truck-ramp-box";

            if (type.includes("Reefer")) {
                iconClass = "fa-solid fa-truck-droplet";
                suggestionFa = (weight > 15 || cbm > 30) ? "کانتینر ۴۰ فوت یخچالی (Reefer 40ft)" : "کامیونت یخچالی";
                suggestionEn = (weight > 15 || cbm > 30) ? "40ft Reefer Container" : "Refrigerated Light Truck";
                suggestionRu = (weight > 15 || cbm > 30) ? "40-футовый рефрижератор" : "Рефрижераторный грузовик";
            } else if (type.includes("Dangerous") || type.includes("DG")) {
                iconClass = "fa-solid fa-truck-fast";
                suggestionFa = "کانتینر ویژه مواد خطرناک + مجوز کلاس خطر";
                suggestionEn = "Specialized DG Container + IMO Permit";
                suggestionRu = "Специализированный контейнер DG + Разрешение IMO";
            } else {
                if(isCbmMode) {
                    if(cbm <= 15) { suggestionFa = "خاور مسقف"; suggestionEn = "Light Box Truck"; suggestionRu = "Легкий фургон"; iconClass = "fa-solid fa-truck"; }
                    else if(cbm <= 33) { suggestionFa = "۱ دستگاه کانتینر ۲۰ فوت"; suggestionEn = "1x 20ft Container"; suggestionRu = "1x 20-футовый контейнер"; iconClass = "fa-solid fa-trailer"; }
                    else if(cbm <= 76) { suggestionFa = "۱ دستگاه کانتینر ۴۰ فوت HC / چادری"; suggestionEn = "1x 40ft HC Container / Tilt Truck"; suggestionRu = "1x 40-футовый HC контейнер"; iconClass = "fa-solid fa-trailer"; }
                    else { let count = Math.ceil(cbm/76); suggestionFa = `${count} دستگاه کانتینر ۴۰ فوت HC`; suggestionEn = `${count}x 40ft HC Containers`; suggestionRu = `${count}x 40-футовых HC контейнеров`; iconClass = "fa-solid fa-truck-ramp-box"; }
                } else {
                    if(weight <= 5) { suggestionFa = "خاور مسقف"; suggestionEn = "Light Box Truck"; suggestionRu = "Легкий фургон"; iconClass = "fa-solid fa-truck"; }
                    else if(weight <= 15) { suggestionFa = "کامیون جفت (۱۰ چرخ)"; suggestionEn = "10-Wheel Truck"; suggestionRu = "10-колесный грузовик"; iconClass = "fa-solid fa-truck-front"; }
                    else if(weight <= 26) { suggestionFa = "۱ دستگاه تریلی چادری یا کانتینر ۴۰ فوت"; suggestionEn = "1x Standard Trailer / 40ft Container"; suggestionRu = "1x Стандартный прицеп / 40-футовый контейнер"; iconClass = "fa-solid fa-trailer"; }
                    else { let count = Math.ceil(weight/26); suggestionFa = `${count} دستگاه کانتینر ۴۰ فوت (یا بوژی)`; suggestionEn = `${count}x 40ft Containers (or Bogie)`; suggestionRu = `${count}x 40-футовых контейнеров (или низкорамный трал)`; iconClass = "fa-solid fa-truck-ramp-box"; }
                }
            }

            icon.className = iconClass;
            textFa.innerText = suggestionFa; textEn.innerText = suggestionEn; textRu.innerText = suggestionRu;
            hiddenVal.value = suggestionEn;
            equipBox.classList.add('active');
        }

        // Weight Slider Sync
        const calcWeightInput = document.getElementById('calcWeight');
        const weightRangeSlider = document.getElementById('weightRangeSlider');
        if (calcWeightInput && weightRangeSlider) {
            weightRangeSlider.addEventListener('input', function() { calcWeightInput.value = this.value; saveCalcProgress(); updateSummaryRealtime(); runSmartEngine(); });
            calcWeightInput.addEventListener('input', function() { if(parseInt(this.value) > 500) this.value = 500; if (this.value) weightRangeSlider.value = this.value; saveCalcProgress(); updateSummaryRealtime(); runSmartEngine(); });
            document.querySelectorAll('input[name="Cargo_Type"]').forEach(r => r.addEventListener('change', () => { saveCalcProgress(); updateSummaryRealtime(); runSmartEngine(); }));
        }

        // Dynamic Transit Timeline + CO2 estimate
        function updateTransitTimeline() {
            const origin = document.getElementById('calcOrigin').value.toLowerCase();
            const dest = document.getElementById('calcDest').value.toLowerCase();
            const lang = document.documentElement.getAttribute('lang');
            
            document.getElementById('tlOrigin').innerText = document.getElementById('calcOrigin').value.split('(')[0].trim() || (lang === 'fa' ? "مبدا" : (lang === 'ru' ? "Откуда" : "Origin"));
            document.getElementById('tlDest').innerText = document.getElementById('calcDest').value.split('(')[0].trim() || (lang === 'fa' ? "مقصد" : (lang === 'ru' ? "Куда" : "Dest"));

            let distanceFactor = 1.5;

            if((origin.includes('چین') || origin.includes('china') || dest.includes('چین') || dest.includes('china'))) {
                distanceFactor = 4.2;
            } else if ((origin.includes('ترکیه') || origin.includes('turkey') || dest.includes('ترکیه') || dest.includes('turkey'))) {
                distanceFactor = 1.8;
            } else if ((origin.includes('امارات') || origin.includes('uae') || dest.includes('امارات') || dest.includes('uae'))) {
                distanceFactor = 0.5;
            } else if ((origin.includes('عراق') || origin.includes('iraq') || origin.includes('افغانستان') || dest.includes('عراق') || dest.includes('افغانستان'))) {
                distanceFactor = 0.8;
            } else if ((origin.includes('اروپا') || origin.includes('germany') || origin.includes('hamburg') || origin.includes('rotterdam') || origin.includes('روتردام') || dest.includes('اروپا') || dest.includes('germany') || dest.includes('hamburg') || dest.includes('rotterdam') || dest.includes('روتردام'))) {
                distanceFactor = 3.5;
            } else if ((origin.includes('هند') || origin.includes('india') || dest.includes('هند') || dest.includes('india'))) {
                distanceFactor = 2.4;
            } else if ((origin.includes('سنگاپور') || origin.includes('singapore') || dest.includes('سنگاپور') || dest.includes('singapore'))) {
                distanceFactor = 3.2;
            }

            const weight = parseFloat(document.getElementById('calcWeight').value) || 20;
            let co2 = (weight * distanceFactor * 0.08).toFixed(2);
            if (co2 < 0.1) co2 = 0.15;
            const co2ValueEl = document.getElementById('co2Value');
            const hiddenCo2El = document.getElementById('hiddenCo2');
            if (co2ValueEl) co2ValueEl.innerText = `${co2} Tons CO₂`;
            if (hiddenCo2El) hiddenCo2El.value = `${co2} Tons`;
        }

        // Form Validation & Prev/Next
        if(multiStepForm) {
            multiStepForm.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' && e.target.tagName !== 'TEXTAREA') {
                    let activeLists = document.querySelectorAll('.autocomplete-items[style*="display: block"]');
                    if (activeLists.length > 0) return;
                    e.preventDefault();
                    if(currentStep < 2) formSteps[currentStep].querySelector('.btn-next').click();
                    else if (currentStep === 2) multiStepForm.dispatchEvent(new Event('submit', { cancelable: true, bubbles: true }));
                }
            });
            ['calcOrigin', 'calcDest'].forEach(id => document.getElementById(id).addEventListener('input', () => { updateSummaryRealtime(); saveCalcProgress(); }));
        }

        ['calcPhone', 'inputPhone'].forEach((id) => {
            const el = document.getElementById(id);
            if (!el) return;
            el.addEventListener('input', () => {
                const next = toAsciiDigits(el.value);
                if (next !== el.value) el.value = next;
            });
        });

        function isStepValid() {
            const inputs = formSteps[currentStep].querySelectorAll('input[required]');
            let valid = true;
            let lang = document.documentElement.getAttribute('lang');
            const errorMsgEl = document.getElementById('errorStep' + (currentStep + 1));
            let errorMessage = "";

            inputs.forEach(input => {
                if (input.type === 'tel') input.value = toAsciiDigits(input.value);
                const targetWrapper = input.closest('.input-icon-wrapper') || input;
                const empty = input.type !== 'radio' && !input.value.trim();
                const nativeBad = input.type !== 'radio' && input.value.trim() && input.checkValidity && !input.checkValidity();
                if (empty || nativeBad) {
                    input.style.borderColor = '#ff4d4d'; input.style.boxShadow = '0 0 10px rgba(255, 77, 77, 0.2)';
                    targetWrapper.classList.remove('error-shake'); void targetWrapper.offsetWidth; targetWrapper.classList.add('error-shake');
                    valid = false; errorMessage = lang === 'fa' ? "لطفاً تمامی فیلدهای الزامی را به درستی پر کنید." : (lang === 'ru' ? "Пожалуйста, заполните все обязательные поля." : "Please fill in all required fields.");
                } else if (input.type !== 'radio') {
                    input.style.borderColor = 'var(--border-color)'; input.style.boxShadow = 'none'; targetWrapper.classList.remove('error-shake');
                }
            });

            if (currentStep === 0) {
                const o = (document.getElementById('calcOrigin').value || '').trim().toLowerCase();
                const d = (document.getElementById('calcDest').value || '').trim().toLowerCase();
                if (o && d && o === d) {
                    valid = false;
                    errorMessage = lang === 'fa' ? "مبدا و مقصد نمی‌توانند یکسان باشند." : (lang === 'ru' ? "Пункты отправления и назначения не должны совпадать." : "Origin and destination cannot be the same.");
                }
            }
            if (currentStep === 2) {
                const email = document.getElementById('calcEmail');
                if (email && email.value.trim() && email.checkValidity && !email.checkValidity()) {
                    valid = false;
                    errorMessage = lang === 'fa' ? "ایمیل معتبر وارد کنید یا خالی بگذارید." : (lang === 'en' ? "Enter a valid email or leave it blank." : "Укажите корректный email или оставьте пустым.");
                }
            }

            if(currentStep === 1) {
                const radios = formSteps[currentStep].querySelectorAll('input[name="Cargo_Type"]');
                if (radios.length > 0) {
                    let radioValid = false;
                    radios.forEach(radio => { if(radio.checked) radioValid = true; });
                    const cardsContainer = document.getElementById('cargoTypeCards');
                    if(!radioValid) {
                        cardsContainer.style.border = '2px dashed #ff4d4d'; cardsContainer.style.background = 'rgba(255, 77, 77, 0.05)';
                        cardsContainer.classList.remove('error-shake'); void cardsContainer.offsetWidth; cardsContainer.classList.add('error-shake');
                        valid = false; errorMessage = lang === 'fa' ? "لطفاً نوع کالا را انتخاب کنید." : (lang === 'ru' ? "Пожалуйста, выберите тип груза." : "Please select cargo type.");
                    } else {
                        cardsContainer.style.border = 'none'; cardsContainer.style.background = 'transparent'; cardsContainer.classList.remove('error-shake');
                    }
                }
            }

            if(errorMsgEl) {
                if (!valid) { errorMsgEl.innerText = errorMessage; errorMsgEl.style.display = 'block'; } 
                else { errorMsgEl.style.display = 'none'; }
            }
            return valid;
        }

        nextBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                if (isStepValid()) { currentStep++; updateFormSteps(); updateProgressbar(); updateTransitTimeline(); saveCalcProgress(); }
            });
        });

        prevBtns.forEach(btn => {
            btn.addEventListener('click', () => { currentStep--; updateFormSteps(); updateProgressbar(); });
        });

        function updateFormSteps() {
            formSteps.forEach((step, index) => { step.classList.toggle('active', index === currentStep); });
            const wrap = document.getElementById('mainCalcWrapper');
            if (wrap) wrap.classList.toggle('has-summary', currentStep === 1 || currentStep === 2);
            const sBox = document.getElementById('floatingSummary');
            if(currentStep === 1 || currentStep === 2) { sBox.style.display = 'flex'; setTimeout(() => sBox.classList.add('visible'), 50); } 
            else { sBox.classList.remove('visible'); setTimeout(() => sBox.style.display = 'none', 300); }
            if (typeof updateSummaryRealtime === 'function') updateSummaryRealtime();
        }

        function updateProgressbar() {
            const isFa = document.documentElement.getAttribute('lang') === 'fa';
            const isComplete = currentStep === progressSteps.length - 1;

            progressSteps.forEach((step, index) => {
                const stepNumFa = ['۱', '۲', '۳', '']; const stepNumEn = ['1', '2', '3', ''];
                if (isComplete || index < currentStep) {
                    step.classList.add('completed');
                    step.classList.remove('active');
                    step.innerHTML = '<i class="fa-solid fa-check" aria-hidden="true"></i>';
                } else if (index === currentStep) {
                    step.classList.add('active');
                    step.classList.remove('completed');
                    step.innerHTML = (index === 3) ? '<i class="fa-solid fa-flag-checkered" aria-hidden="true"></i>' : (isFa ? stepNumFa[index] : stepNumEn[index]);
                } else {
                    step.classList.remove('active', 'completed');
                    step.innerHTML = (index === 3) ? '<i class="fa-solid fa-flag-checkered" aria-hidden="true"></i>' : (isFa ? stepNumFa[index] : stepNumEn[index]);
                }
            });

            const indicator = progressTruck && progressTruck.parentElement;
            if (!indicator || !progressLine) return;

            const indRect = indicator.getBoundingClientRect();
            if (!indRect.width) return;

            const targetStep = isComplete ? progressSteps[progressSteps.length - 1] : progressSteps[currentStep];
            if (!targetStep) return;

            const stepRect = targetStep.getBoundingClientRect();
            const centerX = stepRect.left + stepRect.width / 2 - indRect.left;
            progressTruck.style.right = 'auto';
            progressTruck.style.left = centerX + 'px';
            progressLine.style.width = isComplete ? '100%' : ((isFa ? (indRect.width - centerX) : centerX) + 'px');
        }

        if(multiStepForm) {
            multiStepForm.addEventListener('submit', (e) => {
                e.preventDefault();
                if(!isStepValid()) return;
                const submitBtn = document.getElementById('finalSubmitBtn');
                const ref = makeQuoteRef();
                document.getElementById('hiddenTrackingCode').value = ref;
                document.getElementById('trackingCodeDisplay').innerText = ref;
                document.getElementById('floatingSummary').classList.remove('visible');
                currentStep = 3; updateFormSteps(); updateProgressbar(); updateTransitTimeline();
                localStorage.removeItem('karkia_calc_progress');
                if (submitBtn) submitBtn.disabled = false;
                sendQuoteToCompanyEmail();
                const step4 = document.getElementById('step4');
                if (step4) step4.scrollIntoView({ block: 'center' });
            });
        }

        const mainContactForm = document.getElementById('mainContactForm');
        if(mainContactForm) {
            function buildContactPayload() {
                const lang = document.documentElement.getAttribute('lang') || 'fa';
                const name = document.getElementById('inputName').value.trim();
                const phone = document.getElementById('inputPhone').value.trim();
                const email = document.getElementById('inputEmail').value.trim();
                const message = document.getElementById('inputMessage').value.trim();
                const body = (lang === 'fa' ? 'پیام از سایت کارکیا' : (lang === 'ru' ? 'Сообщение с сайта Karkia' : 'Website contact')) + '\n' + name + '\n' + phone + (email ? '\n' + email : '') + '\n\n' + message;
                const subject = lang === 'fa' ? 'پیام تماس — کارکیا ترابر' : (lang === 'ru' ? 'Сообщение — Karkia Tarabar' : 'Contact — Karkia Tarabar');
                return { body, subject };
            }

            mainContactForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const phoneEl = document.getElementById('inputPhone');
                if (phoneEl) phoneEl.value = toAsciiDigits(phoneEl.value);
                if (!mainContactForm.checkValidity()) {
                    mainContactForm.reportValidity();
                    return;
                }
                const choiceRow = document.getElementById('contactSendChoice');
                if (choiceRow) {
                    choiceRow.hidden = false;
                    choiceRow.scrollIntoView({ block: 'nearest', behavior: 'smooth' });
                }
            });

            const contactViaWhatsApp = document.getElementById('contactViaWhatsApp');
            const contactViaEmail = document.getElementById('contactViaEmail');
            if (contactViaWhatsApp) {
                contactViaWhatsApp.addEventListener('click', () => {
                    const { body } = buildContactPayload();
                    openWhatsApp(body);
                });
            }
            if (contactViaEmail) {
                contactViaEmail.addEventListener('click', () => {
                    const { body, subject } = buildContactPayload();
                    if (window.KTA && KTA.ajax) {
                        const params = new URLSearchParams();
                        params.set('action', 'karkia_contact');
                        params.set('nonce', KTA.nonce);
                        params.set('Name', document.getElementById('inputName').value.trim());
                        params.set('Phone', document.getElementById('inputPhone').value.trim());
                        params.set('Email', document.getElementById('inputEmail').value.trim());
                        params.set('Message', document.getElementById('inputMessage').value.trim());
                        fetch(KTA.ajax, { method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' }, body: params })
                            .catch(function () {});
                    }
                    openMailto(subject, body);
                });
            }
        }

        const quoteWhatsAppBtn = document.getElementById('quoteWhatsAppBtn');
        if (quoteWhatsAppBtn) quoteWhatsAppBtn.addEventListener('click', sendQuoteViaWhatsApp);

        document.querySelectorAll('.faq-question').forEach((btn) => {
            btn.addEventListener('click', () => {
                const item = btn.closest('.faq-item');
                const willOpen = !item.classList.contains('active');
                document.querySelectorAll('.faq-item').forEach((el) => {
                    const panel = el.querySelector('.faq-answer');
                    const q = el.querySelector('.faq-question');
                    if (el.classList.contains('active') && panel) {
                        panel.style.height = panel.scrollHeight + 'px';
                        panel.offsetHeight;
                        panel.style.height = '0px';
                    }
                    el.classList.remove('active');
                    if (q) q.setAttribute('aria-expanded', 'false');
                });
                if (willOpen) {
                    const panel = item.querySelector('.faq-answer');
                    item.classList.add('active');
                    btn.setAttribute('aria-expanded', 'true');
                    panel.style.height = panel.scrollHeight + 'px';
                }
            });
        });

        // --- 5. Base Utilities ---
        function setupHeroVideo() {
            const video = document.querySelector('.hero-video');
            if (!video) return;

            const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            const conn = navigator.connection || navigator.mozConnection || navigator.webkitConnection;
            const saveData = !!(conn && conn.saveData);
            const slowNet = !!(conn && /^(slow-)?2g$/i.test(conn.effectiveType || ''));
            if (reduceMotion || saveData || slowNet) return;

            const source = video.querySelector('source[data-src]');
            if (!source) return;

            let settled = false;
            function fallbackToPoster() {
                if (settled) return;
                settled = true;
                clearTimeout(timeoutId);
                video.removeEventListener('playing', onReady);
                video.removeEventListener('canplay', onReady);
                video.removeEventListener('error', onFail);
                source.removeAttribute('src');
                video.removeAttribute('src');
                video.removeAttribute('autoplay');
                try { video.pause(); } catch (e) {}
                video.load();
            }
            function onReady() {
                if (settled) return;
                settled = true;
                clearTimeout(timeoutId);
                video.removeEventListener('playing', onReady);
                video.removeEventListener('canplay', onReady);
                video.removeEventListener('error', onFail);
            }
            function onFail() { fallbackToPoster(); }

            const timeoutId = setTimeout(fallbackToPoster, 2500);
            video.addEventListener('playing', onReady);
            video.addEventListener('canplay', onReady);
            video.addEventListener('error', onFail);

            source.src = source.getAttribute('data-src');
            source.removeAttribute('data-src');
            video.setAttribute('autoplay', '');
            video.load();
            const playPromise = video.play();
            if (playPromise && typeof playPromise.catch === 'function') {
                playPromise.catch(function () { fallbackToPoster(); });
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const savedLang = localStorage.getItem('site_lang') || 'fa';
            if (savedLang !== 'fa') { setLanguage(savedLang, false); }

            // Hide loader immediately (short fade only — no artificial 1.2s wait)
            const loader = document.getElementById('loader');
            if (loader) {
                loader.style.opacity = '0';
                loader.style.pointerEvents = 'none';
                loader.setAttribute('aria-hidden', 'true');
                setTimeout(() => {
                    loader.style.display = 'none';
                    loader.remove();
                }, 300);
            }
            try { restoreCalcProgress(); } catch (e) {}
            try {
                if (/freight-calculator-step-/.test(location.hash)) {
                    currentStep = 0;
                    history.replaceState(null, null, '#freight-calculator');
                }
            } catch (e) {}
            try { updateProgressbar(); } catch (e) {}
            try { setupLazyMap(); } catch (e) {}
            try { setupLazyThree(); } catch (e) {}
            try { setupHeroVideo(); } catch (e) {}

            setupAutocomplete(document.getElementById('calcOrigin'), document.getElementById('calcOriginList'));
            setupAutocomplete(document.getElementById('calcDest'), document.getElementById('calcDestList'));

            const navbar = document.getElementById('navbar');
            const scrollTopBtn = document.getElementById('scrollTopBtn');
            
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) navbar.classList.add('scrolled'); else navbar.classList.remove('scrolled');
                if (window.scrollY > 500) scrollTopBtn.classList.add('show'); else scrollTopBtn.classList.remove('show');
            });
            window.addEventListener('resize', () => { try { updateProgressbar(); } catch (e) {} });

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => { if (entry.isIntersecting) { entry.target.classList.add('visible'); observer.unobserve(entry.target); }});
            }, { threshold: 0.1, rootMargin: "0px 0px -50px 0px" });

            document.querySelectorAll('.fade-in').forEach((el) => { observer.observe(el); });

            try { initCounters(); } catch (e) {}
            try { initCargoTooltips(); } catch (e) {}
            try { initLiveChat(); } catch (e) {}

            const designerCard = document.getElementById('designerCard');
            const designerRoleBtn = document.getElementById('designerRoleBtn');
            const designerPhone = document.getElementById('designerPhone');
            const hideDesignerPhone = () => {
                if (designerPhone) designerPhone.classList.remove('is-visible');
                if (designerRoleBtn) designerRoleBtn.setAttribute('aria-expanded', 'false');
            };
            if (designerRoleBtn && designerPhone) {
                designerRoleBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    const show = !designerPhone.classList.contains('is-visible');
                    designerPhone.classList.toggle('is-visible', show);
                    designerRoleBtn.setAttribute('aria-expanded', show ? 'true' : 'false');
                });
            }
            if (designerCard) {
                document.addEventListener('click', (e) => {
                    if (!designerCard.contains(e.target)) {
                        designerCard.removeAttribute('open');
                        hideDesignerPhone();
                    }
                });
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape') {
                        designerCard.removeAttribute('open');
                        hideDesignerPhone();
                    }
                });
                designerCard.addEventListener('toggle', () => {
                    if (!designerCard.open) hideDesignerPhone();
                });
            }
        });

        function initCounters() {
            const easeOutQuart = t => 1 - Math.pow(1 - t, 4);
            const isCompact = window.innerWidth <= 1100 || (window.matchMedia('(pointer: coarse)').matches && window.innerWidth <= 1366);
            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.querySelectorAll('.count-val').forEach(counter => {
                            const target = parseInt(counter.getAttribute('data-target'), 10);
                            if (isNaN(target)) return;
                            if (isCompact || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                                counter.innerText = target.toLocaleString('en-US');
                                return;
                            }
                            let startTime = null;
                            const duration = 2500;
                            function animationStep(timestamp) {
                                if (!startTime) startTime = timestamp;
                                const progress = timestamp - startTime;
                                const percentage = Math.min(progress / duration, 1);
                                const currentVal = Math.floor(easeOutQuart(percentage) * target);
                                counter.innerText = currentVal.toLocaleString('en-US');
                                if (progress < duration) {
                                    window.requestAnimationFrame(animationStep);
                                } else {
                                    counter.innerText = target.toLocaleString('en-US');
                                }
                            }
                            window.requestAnimationFrame(animationStep);
                        });
                        obs.unobserve(entry.target);
                    }
                });
            }, { threshold: isCompact ? 0.12 : 0.4 });

            const statsSection = document.getElementById('stats');
            if (statsSection) observer.observe(statsSection);
        }

        function initCargoTooltips() {
            const boxes = document.querySelectorAll('.tooltip-box');
            if (!boxes.length) return;
            boxes.forEach((box) => {
                box.setAttribute('tabindex', '0');
                box.setAttribute('role', 'button');
                box.setAttribute('aria-expanded', 'false');
                const lang = document.documentElement.getAttribute('lang') || 'fa';
                const tip = box.querySelector(`.tooltip-text.lang-${lang}`) || box.querySelector('.tooltip-text');
                if (tip) box.setAttribute('aria-label', tip.textContent.trim());
                const toggle = (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    const willOpen = !box.classList.contains('is-open');
                    boxes.forEach((other) => {
                        other.classList.remove('is-open');
                        other.setAttribute('aria-expanded', 'false');
                    });
                    if (willOpen) {
                        box.classList.add('is-open');
                        box.setAttribute('aria-expanded', 'true');
                    }
                };
                box.addEventListener('click', toggle);
                box.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') toggle(e);
                });
            });
            document.addEventListener('click', () => {
                boxes.forEach((box) => {
                    box.classList.remove('is-open');
                    box.setAttribute('aria-expanded', 'false');
                });
            });
        }

        function initLiveChat() {
            const chatToggleBtn = document.getElementById('chatToggleBtn');
            const chatBox = document.getElementById('chatBox');
            const closeChatBtn = document.getElementById('closeChatBtn');
            const chatInput = document.getElementById('chatInput');
            const sendChatBtn = document.getElementById('sendChatBtn');
            const chatBody = document.getElementById('chatBody');
            if (!chatToggleBtn || !chatBox || !chatInput || !sendChatBtn || !chatBody) return;

            const setChatOpen = (open) => {
                chatBox.classList.toggle('open', open);
                chatToggleBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
                if (open) chatInput.focus();
            };
            chatToggleBtn.addEventListener('click', () => setChatOpen(!chatBox.classList.contains('open')));
            if (closeChatBtn) closeChatBtn.addEventListener('click', () => setChatOpen(false));
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && chatBox.classList.contains('open')) setChatOpen(false);
            });

            const sendMessage = () => {
                const text = chatInput.value.trim();
                if (!text) return;
                const userMsg = document.createElement('div');
                userMsg.className = 'chat-message user-message';
                userMsg.innerText = text;
                chatBody.appendChild(userMsg);
                chatInput.value = '';
                chatBody.scrollTop = chatBody.scrollHeight;
                const currentLang = document.documentElement.getAttribute('lang') || 'fa';
                const agentMsg = document.createElement('div');
                agentMsg.className = 'chat-message agent-message';
                agentMsg.innerText = currentLang === 'en' ? 'Opening WhatsApp…' : (currentLang === 'ru' ? 'Открываем WhatsApp…' : 'در حال باز کردن واتس‌اپ…');
                chatBody.appendChild(agentMsg);
                chatBody.scrollTop = chatBody.scrollHeight;
                openWhatsApp(text);
            };

            sendChatBtn.addEventListener('click', sendMessage);
            chatInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') sendMessage();
            });
        }

        // 🌟 FULL TRI-LINGUAL LANGUAGE ENGINE (FA, EN, RU) 🌟
        function toggleLanguage() {
            const currentLang = document.documentElement.getAttribute('lang');
            let nextLang = currentLang === 'fa' ? 'en' : (currentLang === 'en' ? 'ru' : 'fa');
            setLanguage(nextLang, true);
        }

        function setLanguage(lang, isUserAction = true) {
            const htmlTag = document.documentElement;
            htmlTag.setAttribute('lang', lang);
            htmlTag.setAttribute('dir', lang === 'fa' ? 'rtl' : 'ltr');
            
            let btnText = lang === 'fa' ? 'EN' : (lang === 'en' ? 'RU' : 'FA');
            document.getElementById('langText').innerText = btnText;
            
            if(isUserAction) localStorage.setItem('site_lang', lang);

            // 🌟 SEO FIX: Update Page Title Dynamically for 3 languages
            if (lang === 'fa') document.title = "کارکیا ترابر آسیا | Karkia Tarabar Asia | لجستیک و حمل و نقل بین‌المللی";
            else if (lang === 'en') document.title = "Karkia Tarabar Asia | International Logistics";
            else document.title = "Karkia Tarabar Asia | Международная логистика";

            const metaDesc = document.querySelector('meta[name="description"]');
            if (metaDesc) {
                if (lang === 'fa') metaDesc.setAttribute('content', 'شرکت کارکیا ترابر آسیا، پیشرو در خدمات لجستیک و حمل و نقل بین‌المللی جاده‌ای، ریلی، هوایی و دریایی. ترانزیت ایمن محموله‌های تجاری با شبکه جهانی گسترده و نمایندگان بین المللی.');
                else if (lang === 'en') metaDesc.setAttribute('content', 'Karkia Tarabar Asia — international road, rail, air and sea logistics. Request a freight quote via form, phone or WhatsApp.');
                else metaDesc.setAttribute('content', 'Karkia Tarabar Asia — международная логистика (авто, ж/д, авиа, море). Запрос расчета через форму, телефон или WhatsApp.');
            }

            document.querySelectorAll('[data-placeholder-fa]').forEach(el => {
                el.placeholder = el.getAttribute(`data-placeholder-${lang}`);
            });
            document.querySelectorAll('[data-label-fa]').forEach(el => {
                el.setAttribute('aria-label', el.getAttribute(`data-label-${lang}`) || el.getAttribute('data-label-fa'));
            });
            
            document.querySelectorAll('.loader-text').forEach(el => el.style.display = 'none');
            const loader = document.querySelector(`.loader-text.lang-${lang}`);
            if(loader) loader.style.display = 'block';

            updateProgressbar(); runSmartEngine(); updateTransitTimeline();
        }
    