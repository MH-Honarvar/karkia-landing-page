<?php
/**
 * Front page — full Karkia landing
 *
 * @package Karkia_Tarabar
 */
get_header();
?>
<main id="main-content">

        <!-- Hero Section -->
        <header id="hero" aria-label="Hero Section">
            <video class="hero-video" muted loop playsinline preload="none" poster="<?php echo esc_url( get_template_directory_uri() . '/assets/hero.jpg' ); ?>" aria-hidden="true">
                <source data-src="<?php echo esc_url( get_template_directory_uri() . '/assets/hero.mp4' ); ?>" type="video/mp4">
            </video>
            <h1 class="fade-in">
                <span class="lang-fa">کارکیا ترابر آسیا</span>
                <span class="lang-en" lang="en" dir="ltr">Karkia Tarabar Asia</span>
                <span class="lang-ru" lang="ru" dir="ltr">Каркия Тарабар Азия</span>
            </h1>
            <h2 class="fade-in">
                <span class="lang-fa">راهکارهای نوین لجستیک و حمل و نقل بین المللی</span>
                <span class="lang-en" lang="en" dir="ltr">Advanced Global Logistics & Transportation Solutions</span>
                <span class="lang-ru" lang="ru" dir="ltr">Передовые решения в логистике и международных перевозках</span>
            </h2>
            
            <div class="transport-modes fade-in">
                <a class="mode-item" href="#services"><i class="fa-solid fa-truck" aria-hidden="true"></i><span class="lang-fa">جاده‌ای</span><span class="lang-en" lang="en" dir="ltr">Road</span><span class="lang-ru" lang="ru" dir="ltr">Авто</span></a>
                <a class="mode-item" href="#services"><i class="fa-solid fa-train" aria-hidden="true"></i><span class="lang-fa">ریلی</span><span class="lang-en" lang="en" dir="ltr">Rail</span><span class="lang-ru" lang="ru" dir="ltr">Ж/Д</span></a>
                <a class="mode-item" href="#services"><i class="fa-solid fa-plane" aria-hidden="true"></i><span class="lang-fa">هوایی</span><span class="lang-en" lang="en" dir="ltr">Air</span><span class="lang-ru" lang="ru" dir="ltr">Авиа</span></a>
                <a class="mode-item" href="#services"><i class="fa-solid fa-ship" aria-hidden="true"></i><span class="lang-fa">دریایی</span><span class="lang-en" lang="en" dir="ltr">Sea</span><span class="lang-ru" lang="ru" dir="ltr">Море</span></a>
            </div>

            <div class="hero-slogan fade-in">
                <span class="lang-fa">اعتماد شما، مسئولیت ماست</span>
                <span class="lang-en" lang="en" dir="ltr">Your Trust, Our Responsibility</span>
                <span class="lang-ru" lang="ru" dir="ltr">Ваше доверие — наша ответственность</span>
            </div>
            <div class="hero-cta-row fade-in">
                <a class="hero-cta hero-cta-primary" href="#freight-calculator">
                    <span class="lang-fa">درخواست استعلام کرایه</span>
                    <span class="lang-en" lang="en" dir="ltr">Request a Quote</span>
                    <span class="lang-ru" lang="ru" dir="ltr">Запросить расчет</span>
                </a>
                <a class="hero-cta hero-cta-secondary" href="#contact">
                    <span class="lang-fa">تماس با ما</span>
                    <span class="lang-en" lang="en" dir="ltr">Contact Us</span>
                    <span class="lang-ru" lang="ru" dir="ltr">Связаться с нами</span>
                </a>
            </div>
        </header>

        <!-- About Section -->
        <section id="about" aria-labelledby="about-title">
            <h2 id="about-title" class="section-title fade-in">
                <span class="lang-fa">درباره شرکت</span>
                <span class="lang-en" lang="en" dir="ltr">About the Company</span>
                <span class="lang-ru" lang="ru" dir="ltr">О компании</span>
            </h2>
            <article class="about-content fade-in">
                <p class="lang-fa">شرکت <strong>کارکیا ترابر آسیا</strong> با بیش از ۱۵ سال سابقه در صنعت لجستیک و حمل و نقل بین‌المللی، با اتکا به شبکه‌ای از نمایندگان داخلی و خارجی و تیمی از متخصصان مجرب، خدمات حمل و نقل جاده‌ای، ریلی، هوایی و دریایی را در مسیرهای بین‌المللی ارائه می‌دهد. با حضور در مرزهای کلیدی ایران، هماهنگی زنجیره تأمین را برای مشتریان خود پیگیری می‌کنیم.</p>
                <p class="lang-en" lang="en" dir="ltr"><strong>Karkia Tarabar Asia</strong>, with more than 15 years of experience in international logistics and transportation, relies on a network of domestic and foreign agents and an expert team to provide road, rail, air, and sea transport across global routes. With a presence at key Iranian borders, we coordinate supply-chain movements for our clients.</p>
                <p class="lang-ru" lang="ru" dir="ltr">Компания <strong>Karkia Tarabar Asia</strong> с более чем 15-летним опытом в международной логистике и перевозках опирается на сеть внутренних и зарубежных агентов и команду специалистов, чтобы предоставлять автомобильные, железнодорожные, авиационные и морские перевозки по международным маршрутам. Присутствие на ключевых границах Ирана помогает координировать цепочку поставок для клиентов.</p>
                <div class="about-mission">
                    <span class="lang-fa">ماموریت ما: ارائه خدمات با بالاترین سطح کیفیت، امنیت حداکثری و بهینه‌ترین هزینه برای خلق ارزش و جلب اعتماد پایدار مشتریان.</span>
                    <span class="lang-en" lang="en" dir="ltr">Our Mission: Delivering services with the highest quality, maximum security, and optimal cost to create value and earn the sustainable trust of our clients.</span>
                    <span class="lang-ru" lang="ru" dir="ltr">Наша миссия: предоставление услуг высочайшего качества, максимальной безопасности и оптимальной стоимости для создания ценности и устойчивого доверия клиентов.</span>
                </div>
            </article>
        </section>

        <!-- Corporate Stats Banner -->
        <section id="stats" class="stats-section fade-in">
            <div class="stats-container">
                <div class="stat-item">
                    <i class="fa-solid fa-user-tie stat-icon" aria-hidden="true"></i>
                    <div class="stat-number-wrapper">
                        <span class="count-val stat-number" data-target="300">0</span>
                        <span class="stat-plus">+</span>
                    </div>
                    <div class="stat-desc">
                        <span class="lang-fa">مشتری فعال</span>
                        <span class="lang-en" lang="en" dir="ltr">Active Clients</span>
                        <span class="lang-ru" lang="ru" dir="ltr">Активных клиентов</span>
                    </div>
                </div>
                <div class="stat-item">
                    <i class="fa-solid fa-award stat-icon" aria-hidden="true"></i>
                    <div class="stat-number-wrapper">
                        <span class="count-val stat-number" data-target="15">0</span>
                        <span class="stat-plus">+</span>
                    </div>
                    <div class="stat-desc">
                        <span class="lang-fa">سال تجربه</span>
                        <span class="lang-en" lang="en" dir="ltr">Years of Experience</span>
                        <span class="lang-ru" lang="ru" dir="ltr">Лет опыта</span>
                    </div>
                </div>
                <div class="stat-item">
                    <i class="fa-solid fa-globe stat-icon" aria-hidden="true"></i>
                    <div class="stat-number-wrapper">
                        <span class="count-val stat-number" data-target="40">0</span>
                        <span class="stat-plus">+</span>
                    </div>
                    <div class="stat-desc">
                        <span class="lang-fa">مقصد بین‌المللی</span>
                        <span class="lang-en" lang="en" dir="ltr">International Destinations</span>
                        <span class="lang-ru" lang="ru" dir="ltr">Международных направлений</span>
                    </div>
                </div>
                <div class="stat-item">
                    <i class="fa-solid fa-boxes-packing stat-icon" aria-hidden="true"></i>
                    <div class="stat-number-wrapper">
                        <span class="count-val stat-number" data-target="2500">0</span>
                        <span class="stat-plus">+</span>
                    </div>
                    <div class="stat-desc">
                        <span class="lang-fa">کانتینر حمل شده</span>
                        <span class="lang-en" lang="en" dir="ltr">Containers Shipped</span>
                        <span class="lang-ru" lang="ru" dir="ltr">Перевезённых контейнеров</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="services" aria-labelledby="services-title">
            <h2 id="services-title" class="section-title fade-in">
                <span class="lang-fa">راهکارهای لجستیکی ما</span>
                <span class="lang-en" lang="en" dir="ltr">Our Logistics Solutions</span>
                <span class="lang-ru" lang="ru" dir="ltr">Наши логистические решения</span>
            </h2>
            <div class="services-grid">
                <article class="service-card fade-in">
                    <div class="service-icon"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i></div>
                    <div class="service-info">
                        <h3 class="lang-fa">حمل در شرایط بحران</h3><h3 class="lang-en" lang="en" dir="ltr">Crisis Transport</h3><h3 class="lang-ru" lang="ru" dir="ltr">Антикризисная логистика</h3>
                        <p class="lang-fa">لجستیک تخصصی از طریق مسیرهای جایگزین از جمله دریای عمان در شرایط خاص و محدودیت مسیر.</p>
                        <p class="lang-en" lang="en" dir="ltr">Specialized logistics via alternative routes including the Sea of Oman during disruptions and route constraints.</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Специализированная логистика через альтернативные маршруты, включая Оманское море, при ограничениях пути и особых условиях.</p>
                    </div>
                </article>
                <article class="service-card fade-in">
                    <div class="service-icon"><i class="fa-solid fa-car" aria-hidden="true"></i></div>
                    <div class="service-info">
                        <h3 class="lang-fa">حمل سواری به مناطق آزاد</h3><h3 class="lang-en" lang="en" dir="ltr">Passenger Car Transport to Free Zones</h3><h3 class="lang-ru" lang="ru" dir="ltr">Перевозка автомобилей в свободные зоны</h3>
                        <p class="lang-fa">ارائه خدمات حمل خودروهای سواری به مناطق آزاد با سرعت و ایمنی کامل.</p>
                        <p class="lang-en" lang="en" dir="ltr">Passenger car transport to free zones, delivered promptly and safely.</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Перевозка легковых автомобилей в свободные экономические зоны быстро и безопасно.</p>
                    </div>
                </article>
                <article class="service-card fade-in">
                    <div class="service-icon"><i class="fa-solid fa-train-subway" aria-hidden="true"></i></div>
                    <div class="service-info">
                        <h3 class="lang-fa">ترانزیت ریلی بین‌المللی</h3><h3 class="lang-en" lang="en" dir="ltr">International Rail Transit</h3><h3 class="lang-ru" lang="ru" dir="ltr">Международный железнодорожный транзит</h3>
                        <p class="lang-fa">حمل ریلی منظم، پرظرفیت و اقتصادی به مقاصد آسیای میانه و داخل ایران.</p>
                        <p class="lang-en" lang="en" dir="ltr">Regular, high-capacity, and economical rail transport to Central Asia and within Iran.</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Регулярные, вместительные и экономичные железнодорожные перевозки в Центральную Азию и по Ирану.</p>
                    </div>
                </article>
                <article class="service-card fade-in">
                    <div class="service-icon"><i class="fa-solid fa-plane-departure" aria-hidden="true"></i></div>
                    <div class="service-info">
                        <h3 class="lang-fa">کارگو هوایی سریع</h3><h3 class="lang-en" lang="en" dir="ltr">Express Air Cargo</h3><h3 class="lang-ru" lang="ru" dir="ltr">Экспресс-авиадоставка</h3>
                        <p class="lang-fa">ارسال فوری و با ضریب امنیت بالای کالاهای حساس و ارزشمند به سراسر جهان، مطابق قوانین قابل اجرا.</p>
                        <p class="lang-en" lang="en" dir="ltr">Immediate and highly secure dispatch of sensitive and valuable goods worldwide, in line with applicable regulations.</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Срочная и высоконадежная отправка чувствительных и ценных грузов по всему миру в соответствии с применимыми правилами.</p>
                    </div>
                </article>
                <article class="service-card fade-in">
                    <div class="service-icon"><i class="fa-solid fa-globe" aria-hidden="true"></i></div>
                    <div class="service-info">
                        <h3 class="lang-fa">کریدور آسیای میانه</h3><h3 class="lang-en" lang="en" dir="ltr">Central Asia Corridor</h3><h3 class="lang-ru" lang="ru" dir="ltr">Коридор Центральной Азии</h3>
                        <p class="lang-fa">اتصال تجاری کشورهای آسیای میانه به خلیج فارس، هند، چین و بازارهای جهانی و بالعکس.</p>
                        <p class="lang-en" lang="en" dir="ltr">Connecting Central Asian countries to the Persian Gulf, India, China, and global markets — and the reverse direction.</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Торговое соединение стран Центральной Азии с Персидским заливом, Индией, Китаем и мировыми рынками — и в обратном направлении.</p>
                    </div>
                </article>
                <article class="service-card fade-in">
                    <div class="service-icon"><i class="fa-solid fa-truck-fast" aria-hidden="true"></i></div>
                    <div class="service-info">
                        <h3 class="lang-fa">ناوگان جاده‌ای مجهز</h3><h3 class="lang-en" lang="en" dir="ltr">Equipped Road Fleet</h3><h3 class="lang-ru" lang="ru" dir="ltr">Оборудованный автопарк</h3>
                        <p class="lang-fa">جابجایی انواع محموله‌ها از مبادی استراتژیک جهان به نقاط ایران با ناوگان همکار و هماهنگی واحد عملیات برای پیگیری وضعیت بار.</p>
                        <p class="lang-en" lang="en" dir="ltr">Moving various cargoes from strategic origins worldwide to points in Iran with partner fleets and operations follow-up on shipment status.</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Перевозка различных грузов из стратегических пунктов мира в Иран партнерским автопарком и сопровождением операций для отслеживания статуса груза.</p>
                    </div>
                </article>
                <article class="service-card fade-in">
                    <div class="service-icon"><i class="fa-solid fa-apple-whole" aria-hidden="true"></i></div>
                    <div class="service-info">
                        <h3 class="lang-fa">حمل تخصصی میوه و تره‌بار</h3><h3 class="lang-en" lang="en" dir="ltr">Specialized Fruit & Produce Transport</h3><h3 class="lang-ru" lang="ru" dir="ltr">Перевозка фруктов и овощей</h3>
                        <p class="lang-fa">حمل میوه، تره‌بار و کالاهای فاسدشدنی با رعایت استانداردهای دمایی و بهداشتی.</p>
                        <p class="lang-en" lang="en" dir="ltr">Transport of fruit, produce, and perishable goods in line with temperature and sanitary standards.</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Перевозка фруктов, овощей и скоропортящихся грузов с соблюдением температурных и санитарных стандартов.</p>
                    </div>
                </article>
                <article class="service-card fade-in">
                    <div class="service-icon"><i class="fa-solid fa-box-open" aria-hidden="true"></i></div>
                    <div class="service-info">
                        <h3 class="lang-fa">مدیریت محموله‌های صادراتی</h3><h3 class="lang-en" lang="en" dir="ltr">Export Shipment Management</h3><h3 class="lang-ru" lang="ru" dir="ltr">Управление экспортными грузами</h3>
                        <p class="lang-fa">پوشش فورواردری و ترخیص برای محموله‌های صادراتی با برنامه‌ریزی زمان‌بندی و هماهنگی با مشتری.</p>
                        <p class="lang-en" lang="en" dir="ltr">Forwarding and clearance for export shipments, with scheduled timing coordinated with the client.</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Экспедирование и таможенное оформление экспортных грузов с планированием сроков и согласованием с клиентом.</p>
                    </div>
                </article>
                <article class="service-card fade-in">
                    <div class="service-icon"><i class="fa-solid fa-boxes-packing" aria-hidden="true"></i></div>
                    <div class="service-info">
                        <h3 class="lang-fa">مدیریت محموله‌های وارداتی</h3><h3 class="lang-en" lang="en" dir="ltr">Import Shipment Management</h3><h3 class="lang-ru" lang="ru" dir="ltr">Управление импортными грузами</h3>
                        <p class="lang-fa">حمل تمام محموله‌های وارداتی از تمام نقاط جهان به ایران به صورت مطمئن و مقرون‌به‌صرفه.</p>
                        <p class="lang-en" lang="en" dir="ltr">Safe and cost-effective transport of all import shipments from anywhere in the world to Iran.</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Надежная и экономичная перевозка всех импортных грузов из любой точки мира в Иран.</p>
                    </div>
                </article>
            </div>
        </section>

        <!-- Advantages Section -->
        <section id="advantages" aria-labelledby="advantages-title">
            <h2 id="advantages-title" class="section-title fade-in">
                <span class="lang-fa">چرا کارکیا ترابر؟</span>
                <span class="lang-en" lang="en" dir="ltr">Why Karkia Tarabar?</span>
                <span class="lang-ru" lang="ru" dir="ltr">Почему Karkia Tarabar?</span>
            </h2>
            <div class="adv-container">
                <article class="adv-item fade-in">
                    <div class="adv-icon"><i class="fa-solid fa-certificate" aria-hidden="true"></i></div>
                    <div class="adv-text">
                        <h3 class="lang-fa">عضویت در سازمان FIATA</h3><h3 class="lang-en" lang="en" dir="ltr">FIATA Membership</h3><h3 class="lang-ru" lang="ru" dir="ltr">Членство в FIATA</h3>
                        <p class="lang-fa">عضویت رسمی در فدراسیون بین‌المللی انجمن‌های حمل‌ونقل (FIATA)، نشان‌دهنده تعهد ما به رعایت استانداردهای جهانی در حوزه لجستیک است.</p>
                        <p class="lang-en" lang="en" dir="ltr">Official membership in the International Federation of Freight Forwarders Associations (FIATA), demonstrating our commitment to global logistics standards.</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Официальное членство в Международной федерации экспедиторских ассоциаций, демонстрирующее нашу приверженность мировым стандартам.</p>
                    </div>
                </article>
                <article class="adv-item fade-in">
                    <div class="adv-icon"><i class="fa-solid fa-map-location-dot" aria-hidden="true"></i></div>
                    <div class="adv-text">
                        <h3 class="lang-fa">نمایندگان تجاری فعال در چین</h3><h3 class="lang-en" lang="en" dir="ltr">Active Commercial Agents in China</h3><h3 class="lang-ru" lang="ru" dir="ltr">Действующие коммерческие агенты в Китае</h3>
                        <p class="lang-fa">دارای نمایندگی مستقیم در چین جهت تسهیل فرآیندهای تأمین، حمل و ترخیص کالا با سرعت، دقت و اطمینان بالا.</p>
                        <p class="lang-en" lang="en" dir="ltr">We have direct representation in China to facilitate sourcing, transport, and customs clearance with speed, accuracy, and reliability.</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Прямое представительство в Китае для ускорения закупок, перевозок и таможенного оформления с высокой скоростью, точностью и надежностью.</p>
                    </div>
                </article>
                <article class="adv-item fade-in">
                    <div class="adv-icon"><i class="fa-solid fa-sitemap" aria-hidden="true"></i></div>
                    <div class="adv-text">
                        <h3 class="lang-fa">هلدینگ تخصصی حمل‌ونقل و سوخت</h3><h3 class="lang-en" lang="en" dir="ltr">Specialized Transport and Fuel Holding</h3><h3 class="lang-ru" lang="ru" dir="ltr">Транспортно-топливный холдинг</h3>
                        <p class="lang-fa">فعالیت به عنوان هلدینگ در حوزه حمل‌ونقل بین‌المللی و تأمین سوخت، با هدف ارائه خدمات یکپارچه و کاهش هزینه‌های عملیاتی مشتریان.</p>
                        <p class="lang-en" lang="en" dir="ltr">Operating as a holding in international transport and fuel supply, aiming to provide integrated services and reduce operational costs for customers.</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Работа в качестве холдинга в сфере международных перевозок и поставок топлива, с целью интеграции услуг и снижения затрат клиентов.</p>
                        <div class="holding-subs">
                            <span class="lang-fa">افتخار توس</span><span class="lang-en" lang="en" dir="ltr">Eftekhare Toos</span><span class="lang-ru" lang="ru" dir="ltr">Эфтехар Тус</span>
                            <span class="lang-fa">اترک بار خراسان</span><span class="lang-en" lang="en" dir="ltr">Atrak Bar Khorasan</span><span class="lang-ru" lang="ru" dir="ltr">Атрак Бар Хорасан</span>
                            <span class="lang-fa">پتروپالایش</span><span class="lang-en" lang="en" dir="ltr">Petro Palayesh</span><span class="lang-ru" lang="ru" dir="ltr">Петро Палаеш</span>
                        </div>
                    </div>
                </article>
                <article class="adv-item fade-in">
                    <div class="adv-icon"><i class="fa-solid fa-building-flag" aria-hidden="true"></i></div>
                    <div class="adv-text">
                        <h3 class="lang-fa">دفاتر فعال در امارات و عمان</h3><h3 class="lang-en" lang="en" dir="ltr">Active Offices in UAE and Oman</h3><h3 class="lang-ru" lang="ru" dir="ltr">Офисы в ОАЭ и Омане</h3>
                        <p class="lang-fa">دارای دفاتر فعال در امارات متحده عربی و عمان جهت تسریع در عملیات لجستیکی و پوشش کامل مسیرهای حوزه خلیج فارس.</p>
                        <p class="lang-en" lang="en" dir="ltr">Having active offices in the United Arab Emirates and Oman to accelerate logistics operations and fully cover Persian Gulf routes.</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Действующие офисы в ОАЭ и Омане для ускорения логистических операций и полного покрытия маршрутов Персидского залива.</p>
                    </div>
                </article>
                <article class="adv-item fade-in">
                    <div class="adv-icon"><i class="fa-solid fa-network-wired" aria-hidden="true"></i></div>
                    <div class="adv-text">
                        <h3 class="lang-fa">شبکه نمایندگان در آسیای میانه</h3><h3 class="lang-en" lang="en" dir="ltr">Network of Agents in Central Asia</h3><h3 class="lang-ru" lang="ru" dir="ltr">Сеть агентов в Центральной Азии</h3>
                        <p class="lang-fa">برخورداری از نمایندگان تجاری در کشورهای ازبکستان، تاجیکستان و ترکمنستان برای توسعه مسیرهای ترانزیتی و افزایش دسترسی منطقه‌ای.</p>
                        <p class="lang-en" lang="en" dir="ltr">Commercial agents in Uzbekistan, Tajikistan, and Turkmenistan to develop transit routes and expand regional access.</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Коммерческие агенты в Узбекистане, Таджикистане и Туркменистане для развития транзитных маршрутов и расширения регионального доступа.</p>
                    </div>
                </article>
            </div>
        </section>

        <!-- Interactive Transit Routes Map -->
        <section id="route-map" aria-labelledby="map-title">
            <h2 id="map-title" class="section-title fade-in">
                <span class="lang-fa">مسیرهای فعالیت بین‌المللی کارکیا ترابر</span>
                <span class="lang-en" lang="en" dir="ltr">Karkia Tarabar international routes</span>
                <span class="lang-ru" lang="ru" dir="ltr">Международные маршруты Karkia Tarabar</span>
            </h2>
            <div class="map-wrapper fade-in">
                <div id="echarts-map" class="echarts-container"></div>
                <div id="map-info-panel" class="map-info-panel">
                    <p class="lang-fa">مسیرهای ترانزیتی فعال ما در این نقشه قابل مشاهده است.</p>
                    <p class="lang-en" lang="en" dir="ltr">Our active transit routes are visible on this map.</p>
                    <p class="lang-ru" lang="ru" dir="ltr">Наши активные транзитные маршруты показаны на этой карте.</p>
                </div>
            </div>
        </section>

        <!-- SEO Booster: FAQ Section -->
        <section id="faq" aria-labelledby="faq-title">
            <h2 id="faq-title" class="section-title fade-in">
                <span class="lang-fa">سوالات متداول</span>
                <span class="lang-en" lang="en" dir="ltr">Frequently Asked Questions</span>
                <span class="lang-ru" lang="ru" dir="ltr">Часто задаваемые вопросы</span>
            </h2>
                        <div class="faq-container fade-in">
                <article class="faq-item">
                    <button type="button" class="faq-question" aria-expanded="false" aria-controls="faq-a1" id="faq-q1">
                        <span class="lang-fa">خدمات اصلی شرکت کارکیا ترابر چیست؟</span>
                        <span class="lang-en" lang="en" dir="ltr">What are Karkia Tarabar's main services?</span>
                        <span class="lang-ru" lang="ru" dir="ltr">Какие основные услуги предоставляет Karkia Tarabar?</span>
                        <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
                    </button>
                    <div class="faq-answer" id="faq-a1">
                        <div class="faq-answer-inner">
                        <p class="lang-fa">ما خدمات جامع حمل و نقل جاده‌ای، ریلی، هوایی و دریایی، همراه با ترانزیت تخصصی محموله‌های صادراتی و وارداتی را در سطح بین‌المللی ارائه می‌دهیم.</p>
                        <p class="lang-en" lang="en" dir="ltr">We provide comprehensive road, rail, air, and sea transport, together with specialized transit of export and import shipments internationally.</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Мы предоставляем комплексные автомобильные, железнодорожные, авиационные и морские перевозки, а также специализированный транзит экспортных и импортных грузов на международном уровне.</p>
                        </div>
                    </div>
                </article>
                <article class="faq-item">
                    <button type="button" class="faq-question" aria-expanded="false" aria-controls="faq-a2" id="faq-q2">
                        <span class="lang-fa">آیا شما در کشورهای دیگر هم نمایندگی دارید؟</span>
                        <span class="lang-en" lang="en" dir="ltr">Do you have agencies in other countries?</span>
                        <span class="lang-ru" lang="ru" dir="ltr">Есть ли у вас агентства в других странах?</span>
                        <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
                    </button>
                    <div class="faq-answer" id="faq-a2">
                        <div class="faq-answer-inner">
                        <p class="lang-fa">بله، کارکیا ترابر دارای دفاتر فعال در امارات متحده عربی، عمان و نمایندگان تجاری رسمی در چین و کشورهای کلیدی آسیای میانه می‌باشد.</p>
                        <p class="lang-en" lang="en" dir="ltr">Yes, Karkia Tarabar has active offices in the UAE, Oman, and official commercial agents in China and key Central Asian countries.</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Да, у Karkia Tarabar есть действующие офисы в ОАЭ и Омане, а также официальные коммерческие агенты в Китае и ключевых странах Центральной Азии.</p>
                        </div>
                    </div>
                </article>
                <article class="faq-item">
                    <button type="button" class="faq-question" aria-expanded="false" aria-controls="faq-a3" id="faq-q3">
                        <span class="lang-fa">چگونه می‌توانم استعلام قیمت بگیرم؟</span>
                        <span class="lang-en" lang="en" dir="ltr">How can I get a freight quote?</span>
                        <span class="lang-ru" lang="ru" dir="ltr">Как я могу получить расчет стоимости?</span>
                        <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
                    </button>
                    <div class="faq-answer" id="faq-a3">
                        <div class="faq-answer-inner">
                        <p class="lang-fa">از فرم درخواست استعلام در همین سایت، فرم تماس، تلفن دفتر یا واتس‌اپ جزئیات بار را بفرستید تا کارشناس نرخ را اعلام کند. این فرم قیمت لحظه‌ای محاسبه نمی‌کند.</p>
                        <p class="lang-en" lang="en" dir="ltr">Send shipment details via the quote request form, contact form, phone, or WhatsApp. A specialist will provide the rate — this form does not calculate live prices.</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Отправьте детали груза через форму заявки на этом сайте, форму контакта, телефон офиса или WhatsApp — специалист сообщит тариф. Форма не считает онлайн-цену.</p>
                        </div>
                    </div>
                </article>
            </div>
        </section>

        <!-- 🌟 WEB-APP SMART FREIGHT CALCULATOR (V2.0 PRO) 🌟 -->
        <section id="freight-calculator" aria-labelledby="calc-title">
            <p class="step-desc" style="text-align:center; max-width:720px; margin:-20px auto 30px;">
                <span class="lang-fa">این فرم قیمت لحظه‌ای محاسبه نمی‌کند. جزئیات بار را می‌فرستید تا کارشناس نرخ را اعلام کند.</span>
                <span class="lang-en" lang="en" dir="ltr">This form does not calculate a live rate. Send shipment details and a specialist will quote you.</span>
                <span class="lang-ru" lang="ru" dir="ltr">Форма не считает онлайн-ставку. Отправьте данные груза — специалист сообщит тариф.</span>
            </p>
            
            <h2 id="calc-title" class="section-title fade-in">
                <span class="lang-fa">فرم استعلام کرایه</span>
                <span class="lang-en" lang="en" dir="ltr">Freight Quote Request</span>
                <span class="lang-ru" lang="ru" dir="ltr">Заявка на расчет перевозки</span>
            </h2>
            
            <div class="calc-wrapper fade-in" id="mainCalcWrapper">
                
                <!-- Floating Real-Time Summary -->
                <div class="floating-summary" id="floatingSummary" aria-live="polite">
                    <h4 class="lang-fa"><i class="fa-solid fa-receipt" aria-hidden="true"></i> خلاصه درخواست</h4>
                    <h4 class="lang-en" lang="en" dir="ltr"><i class="fa-solid fa-receipt" aria-hidden="true"></i> Request Summary</h4>
                    <h4 class="lang-ru" lang="ru" dir="ltr"><i class="fa-solid fa-receipt" aria-hidden="true"></i> Сводка заявки</h4>
                    <ul>
                        <li><span class="label lang-fa">مبدا:</span><span class="label lang-en" lang="en" dir="ltr">Origin:</span><span class="label lang-ru" lang="ru" dir="ltr">Откуда:</span> <span class="val" id="sumOrigin">-</span></li>
                        <li><span class="label lang-fa">مقصد:</span><span class="label lang-en" lang="en" dir="ltr">Destination:</span><span class="label lang-ru" lang="ru" dir="ltr">Куда:</span> <span class="val" id="sumDest">-</span></li>
                        <li><span class="label lang-fa">نوع کالا:</span><span class="label lang-en" lang="en" dir="ltr">Cargo:</span><span class="label lang-ru" lang="ru" dir="ltr">Груз:</span> <span class="val" id="sumCargo">-</span></li>
                        <li><span class="label lang-fa">وزن / حجم:</span><span class="label lang-en" lang="en" dir="ltr">Weight/Vol:</span><span class="label lang-ru" lang="ru" dir="ltr">Вес/Объем:</span> <span class="val" id="sumWeight">-</span></li>
                    </ul>
                </div>

                <div class="calc-main-area">
                    <!-- Animated Progress Indicator with Truck -->
                    <div class="step-indicator" aria-hidden="true">
                        <i class="fa-solid fa-truck-moving progress-truck progress-truck-icon" id="progressTruck"></i>
                        <div class="step-progress-line" id="progressLine" style="width: 0%;"></div>
                        <div class="step active" data-step="1">۱</div>
                        <div class="step" data-step="2">۲</div>
                        <div class="step" data-step="3">۳</div>
                        <div class="step" data-step="4"><i class="fa-solid fa-flag-checkered"></i></div>
                    </div>

                    <div class="calc-form-container" aria-live="polite">
                        <form id="multiStepForm" class="calc-form" action="#" method="post" novalidate>
                            <input type="hidden" name="Quote_Ref" id="hiddenTrackingCode" value="">
                            <input type="hidden" name="Total_CBM" id="hiddenCbm" value="N/A">
                            <input type="hidden" name="Recommended_Equipment" id="hiddenEquip" value="N/A">
                            <input type="hidden" name="Estimated_CO2" id="hiddenCo2" value="N/A">
                            
                            <!-- 🛡️ SECURITY FIX: Honeypot (Anti-Spam) -->
                            <input type="text" name="_honey" style="display:none" tabindex="-1" autocomplete="off" aria-hidden="true">
                            
                            <!-- Step 1: Route with Autocomplete -->
                            <div class="form-step active" id="step1">
                                <h3 class="lang-fa">مبدا و مقصد را مشخص کنید</h3>
                                <h3 class="lang-en" lang="en" dir="ltr">Specify origin and destination</h3>
                                <h3 class="lang-ru" lang="ru" dir="ltr">Укажите пункт отправления и назначения</h3>
                                <p class="step-desc">
                                    <span class="lang-fa">از لیست پیشنهادی گمرکات و بنادر انتخاب کنید.</span>
                                    <span class="lang-en" lang="en" dir="ltr">Select from our port and customs database.</span>
                                    <span class="lang-ru" lang="ru" dir="ltr">Выберите из нашей базы данных портов и таможен.</span>
                                </p>
                                
                                <div class="form-group-row">
                                    <div class="autocomplete-wrapper">
                                        <div class="field-hint" id="hintOrigin" role="tooltip">
                                            <span class="lang-fa">شهر، بندر، گمرک یا مرز مبدأ را بنویسید یا از لیست انتخاب کنید.</span>
                                            <span class="lang-en" lang="en" dir="ltr">Type the origin city, port, border or customs office, or pick from the list.</span>
                                            <span class="lang-ru" lang="ru" dir="ltr">Введите город, порт, границу или таможню отправления или выберите из списка.</span>
                                        </div>
                                        <div class="input-icon-wrapper">
                                            <input type="text" name="Origin" id="calcOrigin" maxlength="150" data-placeholder-fa="مبدا (مثال: بندرعباس)" data-placeholder-en="Origin (e.g. Bandar Abbas)" data-placeholder-ru="Откуда (напр. Бендер-Аббас)" placeholder="مبدا (مثال: بندرعباس)" required aria-required="true" autocomplete="off" data-gtm="input_origin" aria-describedby="hintOrigin">
                                            <i class="fa-solid fa-location-dot field-icon" aria-hidden="true"></i>
                                        </div>
                                        <div id="calcOriginList" class="autocomplete-items" style="display:none;" role="listbox"></div>
                                    </div>
                                    
                                    <div class="autocomplete-wrapper">
                                        <div class="field-hint" id="hintDest" role="tooltip">
                                            <span class="lang-fa">شهر، بندر، گمرک یا مرز مقصد را بنویسید یا از پیشنهادها انتخاب کنید.</span>
                                            <span class="lang-en" lang="en" dir="ltr">Type the destination city, port, border or customs office, or pick from the suggestions.</span>
                                            <span class="lang-ru" lang="ru" dir="ltr">Введите город, порт, границу или таможню назначения или выберите из подсказок.</span>
                                        </div>
                                        <div class="input-icon-wrapper">
                                            <input type="text" name="Destination" id="calcDest" maxlength="150" data-placeholder-fa="مقصد (مثال: شانگهای)" data-placeholder-en="Destination (e.g. Shanghai)" data-placeholder-ru="Куда (напр. Шанхай)" placeholder="مقصد (مثال: شانگهای)" required aria-required="true" autocomplete="off" data-gtm="input_destination" aria-describedby="hintDest">
                                            <i class="fa-solid fa-map-pin field-icon" aria-hidden="true"></i>
                                        </div>
                                        <div id="calcDestList" class="autocomplete-items" style="display:none;" role="listbox"></div>
                                    </div>
                                </div>
                                <p class="form-error-msg" id="errorStep1" aria-live="assertive"></p>
                                <div class="btn-group-step">
                                    <button type="button" class="btn-next" aria-label="Next step" data-gtm="btn_step1_next">
                                        <span class="lang-fa">تایید مسیر <i class="fa-solid fa-arrow-left" aria-hidden="true"></i></span>
                                        <span class="lang-en" lang="en" dir="ltr">Confirm Route <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
                                        <span class="lang-ru" lang="ru" dir="ltr">Подтвердить маршрут <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
                                    </button>
                                </div>
                            </div>

                            <!-- Step 2: Cargo + 3D CBM + Smart Engine -->
                            <div class="form-step" id="step2">
                                <h3 class="lang-fa">مشخصات فنی محموله</h3>
                                <h3 class="lang-en" lang="en" dir="ltr">Technical cargo details</h3>
                                <h3 class="lang-ru" lang="ru" dir="ltr">Технические характеристики груза</h3>
                                
                                <fieldset style="border:none; padding:0; margin:0;">
                                    <legend class="sr-only">نوع کالا / Cargo Type</legend>
                                    <div class="cargo-cards" id="cargoTypeCards">
                                        <label class="cargo-card-label">
                                            <input type="radio" name="Cargo_Type" value="General Cargo" required>
                                            <div class="card-content">
                                                <i class="fa-solid fa-box-open card-main-icon" aria-hidden="true"></i><br>
                                                <span class="lang-fa card-title">کالای عمومی</span>
                                                <span class="lang-en card-title" lang="en" dir="ltr">General Cargo</span>
                                                <span class="lang-ru card-title" lang="ru" dir="ltr">Генеральный груз</span>
                                                <div class="tooltip-box">
                                                    <i class="fa-solid fa-circle-info tooltip-icon" aria-hidden="true"></i>
                                                    <span class="tooltip-text lang-fa">بارهای استاندارد، خشک و پالت‌بندی شده</span>
                                                    <span class="tooltip-text lang-en" lang="en" dir="ltr">Standard, dry, and palletized goods</span>
                                                    <span class="tooltip-text lang-ru" lang="ru" dir="ltr">Стандартные, сухие и пакетированные грузы</span>
                                                </div>
                                            </div>
                                        </label>
                                        <label class="cargo-card-label">
                                            <input type="radio" name="Cargo_Type" value="Reefer Cargo">
                                            <div class="card-content">
                                                <i class="fa-solid fa-snowflake card-main-icon" aria-hidden="true"></i><br>
                                                <span class="lang-fa card-title">یخچالی / فاسدشدنی</span>
                                                <span class="lang-en card-title" lang="en" dir="ltr">Reefer / Perishable</span>
                                                <span class="lang-ru card-title" lang="ru" dir="ltr">Рефрижератор / скоропорт</span>
                                                <div class="tooltip-box">
                                                    <i class="fa-solid fa-circle-info tooltip-icon" aria-hidden="true"></i>
                                                    <span class="tooltip-text lang-fa">مواد غذایی نیازمند کنترل دمای دقیق</span>
                                                    <span class="tooltip-text lang-en" lang="en" dir="ltr">Foodstuff requiring temperature control</span>
                                                    <span class="tooltip-text lang-ru" lang="ru" dir="ltr">Грузы, требующие контроля температуры</span>
                                                </div>
                                            </div>
                                        </label>
                                        <label class="cargo-card-label">
                                            <input type="radio" name="Cargo_Type" value="Dangerous Goods">
                                            <div class="card-content">
                                                <i class="fa-solid fa-triangle-exclamation card-main-icon" aria-hidden="true"></i><br>
                                                <span class="lang-fa card-title">خطرناک (DG)</span>
                                                <span class="lang-en card-title" lang="en" dir="ltr">Dangerous Goods</span>
                                                <span class="lang-ru card-title" lang="ru" dir="ltr">Опасный груз</span>
                                                <div class="tooltip-box">
                                                    <i class="fa-solid fa-circle-info tooltip-icon" aria-hidden="true"></i>
                                                    <span class="tooltip-text lang-fa">مواد شیمیایی، اشتعال‌زا (کلاس‌های IMO)</span>
                                                    <span class="tooltip-text lang-en" lang="en" dir="ltr">Chemicals, flammables (IMO Classes)</span>
                                                    <span class="tooltip-text lang-ru" lang="ru" dir="ltr">Химикаты и легковоспламеняющиеся грузы (классы IMO)</span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </fieldset>

                                <!-- 🌟 3D CBM Toggle -->
                                <div class="cbm-toggle-container" id="cbmToggleBtn" role="button" tabindex="0" aria-expanded="false">
                                    <i class="fa-solid fa-cube" aria-hidden="true"></i> 
                                    <span class="lang-fa">محاسبه حجم کالا (CBM) - تخصصی</span>
                                    <span class="lang-en" lang="en" dir="ltr">Calculate cargo volume (CBM) — specialist</span>
                                    <span class="lang-ru" lang="ru" dir="ltr">Расчет объема груза (CBM) — специалист</span>
                                    <i class="fa-solid fa-chevron-down" id="cbmChevron" aria-hidden="true"></i>
                                </div>
                                
                                <!-- 🌟 CSS-Only 3D Cube Visualizer -->
                                <div class="cbm-calculator" id="cbmCalculatorBox">
                                    <p class="lang-fa" style="font-size:0.9rem; margin-bottom:15px; color:var(--text-muted);">ابعاد یک پالت یا کارتن را وارد کنید (به سانتی‌متر)</p>
                                    <p class="lang-en" lang="en" dir="ltr" style="font-size:0.9rem; margin-bottom:15px; color:var(--text-muted);">Enter the dimensions of one pallet or carton (in cm)</p>
                                    <p class="lang-ru" lang="ru" dir="ltr" style="font-size:0.9rem; margin-bottom:15px; color:var(--text-muted);">Введите размеры поддона или коробки (в см)</p>
                                    
                                    <div class="dim-inputs">
                                        <div class="input-icon-wrapper"><input type="text" id="dimL" name="Dim_Length_cm" inputmode="decimal" autocomplete="off" data-placeholder-fa="طول L" data-placeholder-en="Length L" data-placeholder-ru="Длина L" data-label-fa="طول" data-label-en="Length" data-label-ru="Длина" placeholder="طول L" aria-label="طول"><i class="fa-solid fa-arrows-left-right field-icon" aria-hidden="true"></i></div>
                                        <div class="input-icon-wrapper"><input type="text" id="dimW" name="Dim_Width_cm" inputmode="decimal" autocomplete="off" data-placeholder-fa="عرض W" data-placeholder-en="Width W" data-placeholder-ru="Ширина W" data-label-fa="عرض" data-label-en="Width" data-label-ru="Ширина" placeholder="عرض W" aria-label="عرض"><i class="fa-solid fa-up-down-left-right field-icon" aria-hidden="true"></i></div>
                                        <div class="input-icon-wrapper"><input type="text" id="dimH" name="Dim_Height_cm" inputmode="decimal" autocomplete="off" data-placeholder-fa="ارتفاع H" data-placeholder-en="Height H" data-placeholder-ru="Высота H" data-label-fa="ارتفاع" data-label-en="Height" data-label-ru="Высота" placeholder="ارتفاع H" aria-label="ارتفاع"><i class="fa-solid fa-arrows-up-down field-icon" aria-hidden="true"></i></div>
                                        <div class="input-icon-wrapper"><input type="text" id="dimQty" name="Dim_Quantity" inputmode="numeric" autocomplete="off" data-placeholder-fa="تعداد Qty" data-placeholder-en="Quantity" data-placeholder-ru="Кол-во Qty" data-label-fa="تعداد" data-label-en="Quantity" data-label-ru="Количество" placeholder="تعداد Qty" aria-label="تعداد"><i class="fa-solid fa-boxes-stacked field-icon" aria-hidden="true"></i></div>
                                    </div>
                                    
                                    <div id="three-cbm-container" aria-hidden="true">
                                        <div class="three-instruction">
                                            <span class="lang-fa"><i class="fa-solid fa-hand-pointer"></i> برای چرخش و زوم، موس را روی مکعب بکشید</span>
                                            <span class="lang-en" lang="en" dir="ltr"><i class="fa-solid fa-hand-pointer"></i> Drag to rotate, scroll to zoom</span>
                                            <span class="lang-ru" lang="ru" dir="ltr"><i class="fa-solid fa-hand-pointer"></i> Перетащите для вращения, прокрутите для масштаба</span>
                                        </div>
                                        <div class="cube-scene">
                                            <div class="cube" id="cbmCube">
                                                <div class="cube-face cube-face--front">W x H</div>
                                                <div class="cube-face cube-face--back">KTA</div>
                                                <div class="cube-face cube-face--right">L x H</div>
                                                <div class="cube-face cube-face--left">KTA</div>
                                                <div class="cube-face cube-face--top">L x W</div>
                                                <div class="cube-face cube-face--bottom">Bottom</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cbm-result">
                                        <span class="lang-fa">حجم کل:</span>
                                        <span class="lang-en" lang="en" dir="ltr">Total Volume:</span>
                                        <span class="lang-ru" lang="ru" dir="ltr">Общий объем:</span>
                                        <span id="cbmTotalVal">0.00</span> CBM
                                    </div>
                                </div>

                                <!-- Standard Weight Slider -->
                                <div style="margin-top: 30px;" id="weightSection">
                                    <div class="input-icon-wrapper" style="max-width: 400px; margin: 0 auto;">
                                        <input type="number" name="Weight_Ton" id="calcWeight" value="20" data-placeholder-fa="تناژ کل محموله (به تن)" data-placeholder-en="Total Tonnage (Tons)" data-placeholder-ru="Общий тоннаж (в тоннах)" placeholder="تناژ کل محموله (به تن)" required aria-required="true" min="0.1" max="500" step="0.1" data-gtm="input_weight">
                                        <i class="fa-solid fa-weight-scale field-icon" aria-hidden="true"></i>
                                    </div>
                                    <div class="weight-slider-wrapper">
                                        <input type="range" id="weightRangeSlider" min="0.1" max="500" step="0.1" value="20" aria-label="Weight Range Slider">
                                    </div>
                                </div>

                                <!-- Smart Equipment Engine Alert -->
                                <div class="smart-equipment-alert" id="smartEquipmentBox" aria-live="polite">
                                    <i class="fa-solid fa-microchip" id="equipIcon" aria-hidden="true"></i>
                                    <div>
                                        <strong class="lang-fa">پیشنهاد هوشمند ناوگان:</strong>
                                        <strong class="lang-en" lang="en" dir="ltr">Smart Fleet Recommendation:</strong>
                                        <strong class="lang-ru" lang="ru" dir="ltr">Умная рекомендация автопарка:</strong>
                                        <span id="smartEquipmentTextFa" class="lang-fa">...</span>
                                        <span id="smartEquipmentTextEn" class="lang-en" lang="en" dir="ltr">...</span>
                                        <span id="smartEquipmentTextRu" class="lang-ru" lang="ru" dir="ltr">...</span>
                                    </div>
                                </div>

                                <p class="form-error-msg" id="errorStep2" aria-live="assertive"></p>

                                <div class="btn-group-step">
                                    <button type="button" class="btn-prev" aria-label="Previous step">
                                        <span class="lang-fa">بازگشت</span><span class="lang-en" lang="en" dir="ltr">Back</span><span class="lang-ru" lang="ru" dir="ltr">Назад</span>
                                    </button>
                                    <button type="button" class="btn-next" aria-label="Next step" id="btnStep2Next" data-gtm="btn_step2_next">
                                        <span class="lang-fa">بررسی و ادامه <i class="fa-solid fa-arrow-left" aria-hidden="true"></i></span>
                                        <span class="lang-en" lang="en" dir="ltr">Review & Continue <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
                                        <span class="lang-ru" lang="ru" dir="ltr">Проверить и продолжить <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
                                    </button>
                                </div>
                            </div>

                            <!-- Step 3: Contact Info -->
                            <div class="form-step" id="step3">
                                <h3 class="lang-fa">اطلاعات ارتباطی</h3>
                                <h3 class="lang-en" lang="en" dir="ltr">Contact Information</h3>
                                <h3 class="lang-ru" lang="ru" dir="ltr">Контактная информация</h3>
                                <p class="step-desc">
                                    <span class="lang-fa">با زدن دکمه ارسال، جزئیات برای واحد ترافیک ایمیل می‌شود. این مرحله قیمت را حساب نمی‌کند.</span>
                                    <span class="lang-en" lang="en" dir="ltr">Submit emails the details to Traffic. This step does not calculate a price.</span>
                                    <span class="lang-ru" lang="ru" dir="ltr">Отправка пересылает данные в Traffic. Этот шаг не считает цену.</span>
                                </p>
                                
                                <div class="form-group-row">
                                    <div class="input-icon-wrapper">
                                        <input type="tel" name="Phone" id="calcPhone" autocomplete="tel" inputmode="numeric" data-placeholder-fa="شماره موبایل فعال" data-placeholder-en="Active Mobile Number" data-placeholder-ru="Активный мобильный номер" placeholder="شماره موبایل فعال" minlength="10" maxlength="20" pattern="^[0-9۰-۹٠-٩+\-\s()]{10,20}$" title="شماره موبایل را با ارقام فارسی یا انگلیسی وارد کنید" required aria-required="true" data-gtm="input_phone">
                                        <i class="fa-solid fa-mobile-screen field-icon" aria-hidden="true"></i>
                                    </div>
                                    <div class="input-icon-wrapper">
                                        <input type="email" name="Email" id="calcEmail" data-placeholder-fa="ایمیل (اختیاری)" data-placeholder-en="Email (Optional)" data-placeholder-ru="Email (необязательно)" placeholder="ایمیل (اختیاری)" maxlength="100" data-gtm="input_email">
                                        <i class="fa-solid fa-envelope field-icon" aria-hidden="true"></i>
                                    </div>
                                </div>
                                
                                <p class="form-error-msg" id="errorStep3" aria-live="assertive"></p>

                                <div class="btn-group-step">
                                    <button type="button" class="btn-prev" aria-label="Previous step">
                                        <span class="lang-fa">بازگشت</span><span class="lang-en" lang="en" dir="ltr">Back</span><span class="lang-ru" lang="ru" dir="ltr">Назад</span>
                                    </button>
                                    <button type="submit" class="submit-btn" id="finalSubmitBtn" aria-label="Submit form" data-gtm="btn_submit_final">
                                        <span class="lang-fa">آماده‌سازی درخواست</span>
                                        <span class="lang-en" lang="en" dir="ltr">Prepare request</span>
                                        <span class="lang-ru" lang="ru" dir="ltr">Подготовить заявку</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Step 4: Success & Transit Timeline -->
                            <div class="form-step" id="step4">
                                <div class="success-content">
                                    <i class="fa-solid fa-circle-check success-icon" aria-hidden="true"></i>
                                    <h3 class="lang-fa">درخواست آماده ارسال است</h3>
                                    <h3 class="lang-en" lang="en" dir="ltr">Your request is ready to send</h3>
                                    <h3 class="lang-ru" lang="ru" dir="ltr">Заявка готова к отправке</h3>
                                    
                                    <!-- Graphical Transit Timeline -->
                                    <div class="transit-timeline" aria-hidden="true">
                                        <div class="tl-point"><i class="fa-solid fa-warehouse"></i><span id="tlOrigin">Origin</span></div>
                                        <div class="tl-point"><i class="fa-solid fa-building-circle-check"></i><span id="tlDest">Dest</span></div>
                                    </div>

                                    <div class="green-logistics-box" id="co2EstimatorBox">
                                        <div class="gl-icon"><i class="fa-solid fa-leaf" aria-hidden="true"></i></div>
                                        <div class="gl-content">
                                            <div class="gl-title">
                                                <span class="lang-fa">تخمین خیلی تقریبی CO₂ (غیررسمی)</span>
                                                <span class="lang-en" lang="en" dir="ltr">Very rough unofficial CO₂ estimate</span>
                                                <span class="lang-ru" lang="ru" dir="ltr">Грубая неофициальная оценка CO₂</span>
                                            </div>
                                            <div class="gl-value" id="co2Value">—</div>
                                            <div class="gl-desc">
                                                <span class="lang-fa">این عدد مبنای قرارداد یا نرخ نیست؛ فقط ضریب ساده روی وزن است.</span>
                                                <span class="lang-en" lang="en" dir="ltr">Not a contractual figure — a simple weight coefficient only.</span>
                                                <span class="lang-ru" lang="ru" dir="ltr">Не договорная цифра, только простой коэффициент.</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tracking-box">
                                        <p class="lang-fa" style="font-weight:bold; color:var(--text-muted);">شماره ارجاع این درخواست (رهگیری بار نیست):</p>
                                        <p class="lang-en" style="font-weight:bold; color:var(--text-muted);" lang="en" dir="ltr">Request reference (not shipment tracking):</p>
                                        <p class="lang-ru" style="font-weight:bold; color:var(--text-muted);" lang="ru" dir="ltr">Номер заявки (не трекинг груза):</p>
                                        <strong id="trackingCodeDisplay">KTA-—</strong>
                                    </div>

                                    <p class="step-desc" id="quoteSendStatus" data-status="sending">
                                        <span class="quote-status quote-status-sending lang-fa">در حال ارسال ایمیل به واحد ترافیک…</span>
                                        <span class="quote-status quote-status-sending lang-en" lang="en" dir="ltr">Sending email to Traffic desk…</span>
                                        <span class="quote-status quote-status-sending lang-ru" lang="ru" dir="ltr">Отправка email в Traffic…</span>
                                        <span class="quote-status quote-status-sent lang-fa">درخواست برای <span dir="ltr"><?php echo esc_html( karkia_get_option( 'email', 'Traffic@karkiatarabar.com' ) ); ?></span> ارسال شد. پاسخ از طریق تماس یا ایمیل اعلام می‌شود.</span>
                                        <span class="quote-status quote-status-sent lang-en" lang="en" dir="ltr">Request sent to <?php echo esc_html( karkia_get_option( 'email', 'Traffic@karkiatarabar.com' ) ); ?>. We will reply by phone or email.</span>
                                        <span class="quote-status quote-status-sent lang-ru" lang="ru" dir="ltr">Заявка отправлена на <?php echo esc_html( karkia_get_option( 'email', 'Traffic@karkiatarabar.com' ) ); ?>. Ответ по телефону или email.</span>
                                        <span class="quote-status quote-status-fallback lang-fa">ارسال ایمیل تأیید نشد. لطفاً همان درخواست را از طریق واتس‌اپ بفرستید.</span>
                                        <span class="quote-status quote-status-fallback lang-en" lang="en" dir="ltr">Email delivery could not be confirmed. Please send the same request via WhatsApp.</span>
                                        <span class="quote-status quote-status-fallback lang-ru" lang="ru" dir="ltr">Email не подтвержден. Отправьте ту же заявку через WhatsApp.</span>
                                    </p>
                                    <div class="send-choice-row" id="quoteWhatsAppFallback" hidden>
                                        <button type="button" class="send-choice-btn send-choice-btn-wa" id="quoteWhatsAppBtn">
                                            <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                                            <span class="lang-fa">ارسال همان درخواست در واتس‌اپ</span>
                                            <span class="lang-en" lang="en" dir="ltr">Send the same request on WhatsApp</span>
                                            <span class="lang-ru" lang="ru" dir="ltr">Отправить ту же заявку в WhatsApp</span>
                                        </button>
                                    </div>
                                    <iframe name="ktaQuoteMail" id="ktaQuoteMail" title="Quote email delivery" hidden style="display:none;width:0;height:0;border:0"></iframe>

                                    <!-- 🚨 FIX: RESET FORM BUTTON -->
                                    <button type="button" class="action-btn" style="margin: 20px auto; background: var(--accent-gold); color: var(--primary-dark);" onclick="resetCalculatorUI()">
                                        <span class="lang-fa">ثبت درخواست جدید</span>
                                        <span class="lang-en" lang="en" dir="ltr">Submit Another Request</span>
                                        <span class="lang-ru" lang="ru" dir="ltr">Новый запрос</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" aria-labelledby="contact-title">
            <h2 id="contact-title" class="section-title fade-in">
                <span class="lang-fa">شروع همکاری B2B</span>
                <span class="lang-en" lang="en" dir="ltr">Start B2B Collaboration</span>
                <span class="lang-ru" lang="ru" dir="ltr">Начать сотрудничество B2B</span>
            </h2>
            
            <div class="contact-wrapper">
                <div class="contact-info fade-in">
                    <h3 class="lang-fa">ارتباط مستقیم</h3>
                    <h3 class="lang-en" lang="en" dir="ltr">Direct Contact</h3>
                    <h3 class="lang-ru" lang="ru" dir="ltr">Прямой контакт</h3>
                    
                    <div class="info-row"><i class="fa-solid fa-phone" aria-hidden="true"></i><div><strong><span class="lang-fa">تلفن دفتر مرکزی:</span><span class="lang-en" lang="en" dir="ltr">HQ Phone:</span><span class="lang-ru" lang="ru" dir="ltr">Телефон головного офиса:</span></strong> <br><a href="tel:<?php echo esc_attr( karkia_get_option( 'phone_tel', '+985138338411' ) ); ?>" style="color:white; text-decoration:none;" dir="ltr"><?php echo esc_html( karkia_get_option( 'phone_display', '05138338411 - 13' ) ); ?></a></div></div>
                    <div class="info-row"><i class="fa-solid fa-mobile-screen" aria-hidden="true"></i><div><strong><span class="lang-fa">موبایل / واتس‌اپ:</span><span class="lang-en" lang="en" dir="ltr">Mobile / WhatsApp:</span><span class="lang-ru" lang="ru" dir="ltr">Мобильный / WhatsApp:</span></strong> <br><a href="https://wa.me/<?php echo esc_attr( karkia_get_option( 'whatsapp', '989152444149' ) ); ?>" target="_blank" rel="noopener noreferrer" style="color:white; text-decoration:none;" dir="ltr"><?php echo esc_html( karkia_get_option( 'mobile_display', '0915 244 4149' ) ); ?></a></div></div>
                    <div class="info-row"><i class="fa-solid fa-envelope" aria-hidden="true"></i><div><strong><span class="lang-fa">ایمیل سازمانی:</span><span class="lang-en" lang="en" dir="ltr">Corporate Email:</span><span class="lang-ru" lang="ru" dir="ltr">Корпоративная почта:</span></strong> <br><a href="mailto:<?php echo esc_attr( karkia_get_option( 'email', 'Traffic@karkiatarabar.com' ) ); ?>" style="color:white; text-decoration:none;"><?php echo esc_html( karkia_get_option( 'email', 'Traffic@karkiatarabar.com' ) ); ?></a></div></div>
                    <div class="info-row"><i class="fa-solid fa-globe" aria-hidden="true"></i><div><strong><span class="lang-fa">وب‌سایت:</span><span class="lang-en" lang="en" dir="ltr">Website:</span><span class="lang-ru" lang="ru" dir="ltr">Сайт:</span></strong> <br><a href="https://www.karkiatarabar.com" style="color:white; text-decoration:none;">www.karkiatarabar.com</a></div></div>
                    
                    <div class="qr-section">
                        <div class="qr-box">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/qr/contact.png' ); ?>" alt="QR Code for Contact Information" width="120" height="120" loading="lazy" onerror="this.parentElement.style.display='none'">
                            <p class="lang-fa">اطلاعات تماس</p><p class="lang-en" lang="en" dir="ltr">Contact Info</p><p class="lang-ru" lang="ru" dir="ltr">Контакты</p>
                        </div>
                        <div class="qr-box">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/qr/website.png' ); ?>" alt="QR Code for Website" width="120" height="120" loading="lazy" onerror="this.parentElement.style.display='none'">
                            <p class="lang-fa">ورود به وب سایت</p><p class="lang-en" lang="en" dir="ltr">Visit website</p><p class="lang-ru" lang="ru" dir="ltr">Перейти на сайт</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form-container fade-in">
                    <h3 class="lang-fa">ارسال پیام به پشتیبانی</h3>
                    <h3 class="lang-en" lang="en" dir="ltr">Send Message to Support</h3>
                    <h3 class="lang-ru" lang="ru" dir="ltr">Сообщение в поддержку</h3>
                    <form id="mainContactForm" action="#" method="post" aria-label="Contact Form" novalidate>
                        <div class="form-group"><label class="sr-only" for="inputName"><span class="lang-fa">نام شرکت / نام شما</span><span class="lang-en" lang="en" dir="ltr">Company Name / Your Name</span><span class="lang-ru" lang="ru" dir="ltr">Название компании / Ваше имя</span></label><input type="text" name="Name" id="inputName" maxlength="100" autocomplete="organization" data-placeholder-fa="نام شرکت / نام شما" data-placeholder-en="Company Name / Your Name" data-placeholder-ru="Название компании / Ваше имя" placeholder="نام شرکت / نام شما" required aria-required="true"></div>
                        <div class="form-group"><label class="sr-only" for="inputPhone"><span class="lang-fa">شماره موبایل فعال</span><span class="lang-en" lang="en" dir="ltr">Active Mobile Number</span><span class="lang-ru" lang="ru" dir="ltr">Активный мобильный номер</span></label><input type="tel" name="Phone" id="inputPhone" maxlength="20" minlength="10" autocomplete="tel" inputmode="numeric" pattern="^[0-9۰-۹٠-٩+\-\s()]{10,20}$" title="شماره موبایل را با ارقام فارسی یا انگلیسی وارد کنید" data-placeholder-fa="شماره موبایل فعال" data-placeholder-en="Active Mobile Number" data-placeholder-ru="Активный мобильный номер" placeholder="شماره موبایل فعال" required aria-required="true"></div>
                        <div class="form-group"><label class="sr-only" for="inputEmail"><span class="lang-fa">آدرس ایمیل (اختیاری)</span><span class="lang-en" lang="en" dir="ltr">Email Address (Optional)</span><span class="lang-ru" lang="ru" dir="ltr">Email (необязательно)</span></label><input type="email" name="Email" id="inputEmail" maxlength="100" data-placeholder-fa="آدرس ایمیل (اختیاری)" data-placeholder-en="Email Address (Optional)" data-placeholder-ru="Email (необязательно)" placeholder="آدرس ایمیل (اختیاری)"></div>
                        <div class="form-group"><label class="sr-only" for="inputMessage"><span class="lang-fa">پیام یا درخواست</span><span class="lang-en" lang="en" dir="ltr">Message or request</span><span class="lang-ru" lang="ru" dir="ltr">Сообщение или запрос</span></label><textarea rows="5" name="Message" id="inputMessage" maxlength="1000" data-placeholder-fa="لطفاً پیام یا درخواست خود را بنویسید..." data-placeholder-en="Please write your message or request here..." data-placeholder-ru="Напишите ваше сообщение здесь..." placeholder="لطفاً پیام یا درخواست خود را بنویسید..." required aria-required="true"></textarea></div>
                        <button type="submit" class="submit-btn" id="contactSubmitBtn">
                            <i class="fa-regular fa-paper-plane" aria-hidden="true"></i>
                            <span class="lang-fa">ادامه — انتخاب روش ارسال</span><span class="lang-en" lang="en" dir="ltr">Continue — choose how to send</span><span class="lang-ru" lang="ru" dir="ltr">Далее — способ отправки</span>
                        </button>
                        <div class="send-choice-row" id="contactSendChoice" hidden>
                            <button type="button" class="send-choice-btn send-choice-btn-wa" id="contactViaWhatsApp">
                                <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                                <span class="lang-fa">ارسال در واتس‌اپ</span>
                                <span class="lang-en" lang="en" dir="ltr">Send via WhatsApp</span>
                                <span class="lang-ru" lang="ru" dir="ltr">Отправить в WhatsApp</span>
                            </button>
                            <button type="button" class="send-choice-btn send-choice-btn-mail" id="contactViaEmail">
                                <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                                <span class="lang-fa">ارسال با ایمیل</span>
                                <span class="lang-en" lang="en" dir="ltr">Send via Email</span>
                                <span class="lang-ru" lang="ru" dir="ltr">Отправить по email</span>
                            </button>
                        </div>
                        <p class="privacy-note">
                            <span class="lang-fa">با ارسال، نام و شماره برای پاسخ استعلام به واتس‌اپ یا ایمیل سازمانی کارکیا می‌رود. از این داده‌ها برای تماس تجاری استفاده می‌شود.</span>
                            <span class="lang-en" lang="en" dir="ltr">Sending shares your name and number via WhatsApp or company email so we can reply. Used only for business contact.</span>
                            <span class="lang-ru" lang="ru" dir="ltr">Отправка передает имя и номер в WhatsApp или корпоративную почту Karkia для ответа. Данные используются только для делового контакта.</span>
                        </p>
                    </form>
                </div>

                <div class="addresses">
                    <article class="address-card fade-in">
                        <h4><i class="fa-solid fa-building" style="color: var(--accent-teal);" aria-hidden="true"></i><span class="lang-fa">دفتر مرکزی مشهد</span><span class="lang-en" lang="en" dir="ltr">Mashhad Headquarters</span><span class="lang-ru" lang="ru" dir="ltr">Головной офис (Мешхед)</span></h4>
                        <p class="lang-fa"><?php echo nl2br( esc_html( karkia_get_option( 'address_mashhad', 'مشهد، بلوار هفت تیر، بین هفت تیر ۸، برج اداری تجاری آرمیتاژ گلشن، طبقه ۵، واحدهای ۵۰۱ و ۵۰۲' ) ) ); ?> <br><br><strong>کدپستی:</strong> 9178772890</p>
                        <p class="lang-en" lang="en" dir="ltr">Mashhad, Haft-e-Tir Blvd, between Haft-e-Tir 8, Armitaj Golshan office-commercial tower, 5th floor, units 501 & 502 <br><br><strong>Postal Code:</strong> 9178772890</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Мешхед, бульвар Хафт-э-Тир, между Хафт-э-Тир 8, административно-торговая башня Армитаж Голшан, 5 этаж, блоки 501 и 502 <br><br><strong>Почтовый индекс:</strong> 9178772890</p>
                        <div class="map-container">
                            <iframe src="https://www.google.com/maps?q=36.324305,59.499507&amp;hl=fa&amp;z=17&amp;output=embed" title="Mashhad Headquarters Map" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <a class="map-fallback-link" href="https://www.google.com/maps/search/?api=1&amp;query=36.324305,59.499507" target="_blank" rel="noopener noreferrer">
                            <span class="lang-fa">باز کردن موقعیت آرمیتاژ گلشن در نقشه</span>
                            <span class="lang-en" lang="en" dir="ltr">Open Armitaj Golshan on the map</span>
                            <span class="lang-ru" lang="ru" dir="ltr">Открыть расположение Армитаж Голшан на карте</span>
                        </a>
                    </article>
                    
                    <article class="address-card fade-in">
                        <h4><i class="fa-solid fa-anchor" style="color: var(--accent-teal);" aria-hidden="true"></i><span class="lang-fa">شعبه عملیاتی بندرعباس</span><span class="lang-en" lang="en" dir="ltr">Bandar Abbas Operations Branch</span><span class="lang-ru" lang="ru" dir="ltr">Операционный филиал (Бендер-Аббас)</span></h4>
                        <p class="lang-fa"><?php echo nl2br( esc_html( karkia_get_option( 'address_bandar', 'بندر عباس، اوزینها، بلوار طالقانی، کوچه موج ۸، مجتمع تجاری سفیر، طبقه ۴، واحد ۵۰۲' ) ) ); ?></p>
                        <p class="lang-en" lang="en" dir="ltr">Bandar Abbas, Evazinaha, Taleghani Blvd, Moj 8 Alley, Safir Complex, 4th Floor, Unit 502</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Бендер-Аббас, Эвазинаха, Бульвар Талегани, переулок Модж 8, Комплекс Сафир, 4 этаж, Блок 502</p>
                        <div class="map-container">
                            <iframe src="https://www.google.com/maps?q=27.186,56.280&amp;hl=fa&amp;z=16&amp;output=embed" title="Bandar Abbas Branch Map" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <a class="map-fallback-link" href="https://www.google.com/maps/search/?api=1&amp;query=%D8%A8%D9%86%D8%AF%D8%B1%D8%B9%D8%A8%D8%A7%D8%B3%20%D8%A8%D9%84%D9%88%D8%A7%D8%B1%20%D8%B7%D8%A7%D9%84%D9%82%D8%A7%D9%86%DB%8C%20%D9%85%D8%AC%D8%AA%D9%85%D8%B9%20%D8%B3%D9%81%DB%8C%D8%B1" target="_blank" rel="noopener noreferrer">
                            <span class="lang-fa">جستجوی آدرس شعبه بندرعباس در نقشه (موقعیت تقریبی خیابان طالقانی)</span>
                            <span class="lang-en" lang="en" dir="ltr">Search the Bandar Abbas branch address on the map (approx. Taleghani Blvd)</span>
                            <span class="lang-ru" lang="ru" dir="ltr">Поиск адреса филиала в Бендер-Аббасе на карте (ориентир — бульвар Талегани)</span>
                        </a>
                    </article>
                </div>
            </div>
        </section>
    
</main>
<?php
get_footer();
