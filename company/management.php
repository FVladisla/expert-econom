<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Руководство компании Эксперт Эконом");
$APPLICATION->SetPageProperty("keywords", "Руководство, Ланщаков Владислав");
$APPLICATION->SetTitle("Руководство");
?>
<header class="leadership-header">
  <div class="container">
      <h1>Наше руководство</h1>
      <p class="subtitle">Профессионалы, которые превращают образовательные технологии в реальные бизнес-результаты</p>
  </div>
</header>
<section class="leadership-section">
        <div class="container">
            <div class="section-title">
                <h2>Команда основателей</h2>
            </div>
            
            <!-- Карточки руководителей -->
            <div class="team-grid">
                <!-- Основатель -->
                <div class="team-card">
                    <div class="team-image" style="background-image: url('/upload/photo_5211135343120739091_x.jpg');"></div>
                    <div class="team-content">
                        <h3 class="team-name">Владислав Ланщаков</h3>
                        <p class="team-position">Основатель и генеральный директор</p>
                        <p class="team-bio">Эксперт в экономике предприятия с 10-летним опытом в консалтинге. Создал платформу, чтобы решить проблему отсутствия практических знаний у выпускников.</p>
                        <div class="team-social">
                            <?
                              $APPLICATION->IncludeFile(
                                SITE_DIR."include/telegram.php",
                                Array(),
                                Array("MODE"=>"html")
                              );
                            ?>
                            <?
                              $APPLICATION->IncludeFile(
                                SITE_DIR."include/wha.php",
                                Array(),
                                Array("MODE"=>"html")
                              );
                            ?>
                            <?
                              $APPLICATION->IncludeFile(
                                SITE_DIR."include/insta.php",
                                Array(),
                                Array("MODE"=>"html")
                              );
                            ?>
                            
                        </div>
                    </div>
                </div>

                <div class="team-card">
                    <div class="team-image" style="background-image: url('/upload/_DSC8276 (1).jpg');"></div>
                    <div class="team-content">
                        <h3 class="team-name">Татьяна Левченко</h3>
                        <p class="team-position">Доцент кафедры ММиЦРБС, кандидат экономических наук</p>
                        <p class="team-bio">Эксперт в экономике предприятия, составитель многих методических книг, идейный вдохновитель</p>
                        <div class="team-social">
                            <?
                              $APPLICATION->IncludeFile(
                                SITE_DIR."include/telegram.php",
                                Array(),
                                Array("MODE"=>"html")
                              );
                            ?>
                            <?
                              $APPLICATION->IncludeFile(
                                SITE_DIR."include/wha.php",
                                Array(),
                                Array("MODE"=>"html")
                              );
                            ?>
                            <?
                              $APPLICATION->IncludeFile(
                                SITE_DIR."include/insta.php",
                                Array(),
                                Array("MODE"=>"html")
                              );
                            ?>
                            
                        </div>
                    </div>
                </div>
                <!-- Технический директор
                <div class="team-card">
                    <div class="team-image" style="background-image: url('https://example.com/cto.jpg');"></div>
                    <div class="team-content">
                        <h3 class="team-name">Алексей Семёнов</h3>
                        <p class="team-position">Технический директор</p>
                        <p class="team-bio">Архитектор платформы с опытом в EdTech проектах. Отвечает за разработку и интеграцию бизнес-симуляторов с корпоративными системами.</p>
                        <div class="team-social">
                            <a href="#" class="social-icon"><i class="fab fa-github"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                
                Директор по контенту 
                <div class="team-card">
                    <div class="team-image" style="background-image: url('https://example.com/content-director.jpg');"></div>
                    <div class="team-content">
                        <h3 class="team-name">Елена Ковалёва</h3>
                        <p class="team-position">Директор по образовательным технологиям</p>
                        <p class="team-bio">Бывший декан экономического факультета НГУ. Курирует методологию курсов и сотрудничество с вузами.</p>
                        <div class="team-social">
                            <a href="#" class="social-icon"><i class="fas fa-graduation-cap"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-researchgate"></i></a>
                        </div>
                    </div>
                </div> -->
            </div>
            
            <!-- Философия управления -->
            <div class="philosophy-block">
                <h3 class="philosophy-title">Наши принципы управления</h3>
                <div class="philosophy-content">
                    <div class="philosophy-item">
                        <div class="philosophy-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <div>
                            <h4>Ориентация на результат</h4>
                            <p>Каждый курс должен давать измеримые навыки. Мы оцениваем успех по карьерному росту наших студентов.</p>
                        </div>
                    </div>
                    
                    <div class="philosophy-item">
                        <div class="philosophy-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <h4>Культура доверия</h4>
                            <p>Децентрализованные команды с полной ответственностью за свои направления. Никакого микроменеджмента.</p>
                        </div>
                    </div>
                    
                    <div class="philosophy-item">
                        <div class="philosophy-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <div>
                            <h4>Инновации в ДНК</h4>
                            <p>20% рабочего времени сотрудники посвящают экспериментальным проектам в образовательных технологиях.</p>
                        </div>
                    </div>
                    
                    <div class="philosophy-item">
                        <div class="philosophy-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div>
                            <h4>Социальная миссия</h4>
                            <p>30% нашего контента остается бесплатным. Мы верим, что знания должны быть доступны.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Блок CTA -->
            <div style="text-align: center; margin-top: 60px;">
                <h3>Хотите присоединиться к нашей команде?</h3>
                <p>Мы всегда в поиске талантливых преподавателей и разработчиков</p>
                <a href="/company/vacancies.php" style="display: inline-block; margin-top: 20px; background: var(--secondary); color: white; padding: 12px 30px; border-radius: 50px; text-decoration: none; font-weight: bold;" alt='Вакансии'>Посмотреть вакансии</a>
            </div>
        </div>
    </section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>