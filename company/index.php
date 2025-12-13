<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "О компании эксперт эконом");
$APPLICATION->SetPageProperty("keywords", "Компания, Эксперт Эконом, руководство");
$APPLICATION->SetTitle("О нашей компании");
?>
<section class="about-section">
        <div class="container">
            <div class="section-title">
                <h2>О нашей компании</h2>
            </div>
            
            <div class="content-block">
                <h3>Кто мы?</h3>
                <p>«Эксперт Эконом» — это современный образовательный ресурс, созданный в 2025 году в Новосибирске. Наша цель — закрыть разрыв между академическими знаниями и реальными бизнес-задачами.</p>
            </div>
            
            <div class="content-block">
                <h3>Что мы предлагаем?</h3>
                <div class="columns">
                    <div class="column">
                        <ul class="features">
                            <li>Практические курсы на основе реальных российских кейсов</li>
                            <li>Бизнес-симуляторы с интеграцией в 1С и Битрикс24</li>
                        </ul>
                    </div>
                    <div class="column">
                        <ul class="features">
                            <li>Корпоративное обучение по гибкой подписке</li>
                            <li>Маркетплейс для авторов курсов (комиссия всего 10-15%)</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="content-block">
                <h3>Наши преимущества</h3>
                <div class="columns">
                    <div class="column">
                        <ul class="features">
                            <li><strong>Уникальный контент</strong>: 40% материалов — эксклюзивные разборы российских компаний</li>
                            <li><strong>Гибкость</strong>: Доступ к платформе с любого устройства, 30% контента — бесплатно</li>
                        </ul>
                    </div>
                    <div class="column">
                        <ul class="features">
                            <li><strong>Эксперты</strong>: Преподаватели с опытом работы в Альфа-Банке, Сбере и малом бизнесе</li>
                            <li><strong>Практика</strong>: Симуляторы принятия финансовых решений для реальных задач</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Блок с цифрами -->
            <div class="stats">
                <div class="stat-item">
                    <div class="stat-number">8%</div>
                    <p>доля на рынке B2B-обучения к 2027 году</p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">80+</div>
                    <p>авторов курсов на платформе</p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">95%</div>
                    <p>удовлетворенность студентов</p>
                </div>
            </div>
            
            <!-- Цитата -->
            <div class="quote">
                <p>«Онлайн-образование не должно быть скучным. Мы превращаем сложные темы в интерактивные решения, которые работают здесь и сейчас».</p>
                <p class="quote-author">— Владислав Ланщаков, основатель</p>
            </div>
            
            <!-- CTA -->
            <div class="cta">
                <a href="/products/" class="cta-button">Попробуйте бесплатно!</a>
                <p style="margin-top: 15px;">Первый модуль любого курса — без оплаты. Начните обучение сегодня.</p>
            </div>
        </div>
    </section>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>