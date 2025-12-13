<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Миссия и стратегия компании Эксперт Эконом");
$APPLICATION->SetPageProperty("keywords", "Миссия, Стратегия, Эксперт Эконом");
$APPLICATION->SetTitle("Миссия и стратегия");
?> 
    <section class="mission-hero">
      <div class="container">
        <h1 style="color: white;">Наша миссия и стратегия</h1>
        <p class="subtitle">Создаём образовательную экосистему, где знания превращаются в реальные бизнес-результаты</p>
      </div>
    </section>

    <!-- Основной контент -->
    <section class="about-section">
        <div class="container">
            <!-- Блок миссии -->
            <div class="content-block">
                <h2>Наша миссия</h2>
                <p>Мы стремимся сделать профессиональное образование в сфере экономики предприятия доступным, практико-ориентированным и соответствующим реалиям российского бизнеса. Наша цель — чтобы каждый студент, предприниматель или сотрудник компании мог получить именно те знания, которые помогут ему принимать эффективные управленческие решения.</p>
                
                <div class="columns" style="margin-top: 30px;">
                    <div class="column">
                        <h3 style="color: var(--secondary);">Ценности</h3>
                        <ul class="features">
                            <li><strong>Практичность</strong> — только применимые знания</li>
                            <li><strong>Доступность</strong> — 30% контента бесплатно</li>
                            <li><strong>Инновации</strong> — симуляторы и AI-аналитика</li>
                        </ul>
                    </div>
                    <div class="column">
                        <h3 style="color: var(--secondary);">Принципы</h3>
                        <ul class="features">
                            <li><strong>Ориентация на результат</strong> — измеримый прогресс</li>
                            <li><strong>Прозрачность</strong> — честные отзывы и рейтинги</li>
                            <li><strong>Сообщество</strong> — обмен опытом между участниками</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Блок стратегии -->
            <div class="content-block">
                <h2>Стратегия развития</h2>
                <p>Наш трёхлетний план сочетает технологические инновации с глубокой экспертизой в экономике предприятия:</p>
                
                <div class="strategy-cards">
                    <div class="strategy-card">
                        <h3><span>1</span> Технологии</h3>
                        <p>Внедрение AI-ассистента для персонализации обучения и автоматической проверки кейсов к 2026 году</p>
                    </div>
                    <div class="strategy-card">
                        <h3><span>2</span> Контент</h3>
                        <p>Увеличение библиотеки курсов до 100+ программ с акцентом на отраслевые решения (розница, производство, IT)</p>
                    </div>
                    <div class="strategy-card">
                        <h3><span>3</span> Экспансия</h3>
                        <p>Выход на рынки Казахстана и Беларуси с локализованными версиями курсов к 2027 году</p>
                    </div>
                </div>
            </div>

            <!-- Дорожная карта -->
            <div class="content-block">
                <h2 style="text-align: center;">Дорожная карта</h2>
                
                <div class="timeline">
                    <div class="timeline-item">
                        <h3>2025</h3>
                        <p>Запуск проекта с 10 курсами</p>
                        <p>Привлечение первых 2 500 пользователей</p>
                    </div>
                    <div class="timeline-item">
                        <h3>2026</h3>
                        <p>Интеграция с 1С и Битрикс24</p>
                        <p>Запуск корпоративных подписок</p>
                    </div>
                    <div class="timeline-item">
                        <h3>2027</h3>
                        <p>8% доли на B2B-рынке</p>
                        <p>80+ авторов на платформе</p>
                    </div>
                </div>
            </div>

            <!-- Блок CTA -->
            <div class="cta">
                <h2 style="text-align: center; margin-bottom: 20px;">Станьте частью нашего движения</h2>
                <div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
                    <a href="#" class="cta-button">Присоединиться как студент</a>
                    <a href="#" class="cta-button" style="background: var(--primary);">Стать партнёром</a>
                </div>
            </div>
        </div>
    </section>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>