<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Практико-ориентированные курсы с симуляторами реальных бизнес-процессов. • Уникальные кейсы из российской практики • Интерактивные тренажеры финансовых решений • Гибкие форматы обучения для студентов и предпринимателей • Корпоративные решения для бизнеса  Освойте прикладные навыки управления финансами предприятия в цифровом формате!");
$APPLICATION->SetTitle("ЭкспертЭконом");
?><div class="expert-econom-container" style="max-width: 1200px; margin: 0 auto; font-family: 'Arial', sans-serif; color: #333;">
    <!-- Блок о компании -->
    <section style="background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); padding: 30px; margin-bottom: 30px;">
        <h2 style="color: #2c3e50; margin-top: 0; display: flex; align-items: center;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="var(--accent_blue)" style="margin-right: 10px;">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
            </svg>
            О нашей платформе
        </h2>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-top: 20px;">
            <div>
                <p style="line-height: 1.6; margin-bottom: 20px;">
                    <strong>Эксперт Эконом</strong> — это современная образовательная платформа, созданная в 2025 году для профессионального обучения экономике предприятия. Мы сочетаем академические знания с практическими кейсами из российских реалий.
                </p>
                <ul style="padding-left: 20px; line-height: 1.6;">
                    <li>5+ авторских курсов от практикующих экспертов</li>
                    <li>Уникальные бизнес-симуляторы и интеграция с 1С</li>
                    <li>30% контента доступно бесплатно</li>
                    <li>Гибкие форматы обучения для студентов и бизнеса</li>
                </ul>
            </div>
            <div style="background: #f5f7fa; border-radius: 6px; padding: 20px;">
                <h3 style="margin-top: 0; color: #2c3e50;">Наши достижения</h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div style="text-align: center;">
                        <div style="font-size: 24px; font-weight: bold; color: var(--accent_blue);">500+</div>
                        <div style="font-size: 14px;">пользователей</div>
                    </div>
                    <div style="text-align: center;">
                        <div style="font-size: 24px; font-weight: bold; color: var(--accent_blue);">8%</div>
                        <div style="font-size: 14px;">доля B2B-рынка</div>
                    </div>
                    <div style="text-align: center;">
                        <div style="font-size: 24px; font-weight: bold; color: var(--accent_blue);">80+</div>
                        <div style="font-size: 14px;">авторов курсов</div>
                    </div>
                    <div style="text-align: center;">
                        <div style="font-size: 24px; font-weight: bold; color: var(--accent_blue);">2.5М</div>
                        <div style="font-size: 14px;">руб. годовая выручка</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Блок продуктов -->
    <section style="background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); padding: 30px; margin-bottom: 30px;">
        <h2 style="color: #2c3e50; margin-top: 0; display: flex; align-items: center;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="var(--accent_blue)" style="margin-right: 10px;">
                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
            </svg>
            Наши продукты
        </h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; margin-top: 20px;">
			
		<!-- Карточка продукта 1 -->
            <div style="border: 1px solid rgba(0,0,0,0.1); border-radius: 6px; overflow: hidden; transition: all 0.3s;"
                 onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 5px 15px rgba(0,0,0,0.1)'"
                 onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                <div style="height: 120px; background: var(--accent_blue); position: relative;">
                    <div style="position: absolute; bottom: 10px; left: 10px; background: white; color: var(--accent_blue); padding: 3px 8px; border-radius: 12px; font-size: 12px; font-weight: bold;">
                        B2C
                    </div>
                </div>
                <div style="padding: 15px;">
                    <h3 style="margin: 0 0 10px 0; color: #2c3e50;">Онлайн-курсы</h3>
                    <p style="color: #7f8c8d; margin: 0 0 15px 0; font-size: 14px;">Практические программы по экономике предприятия</p>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div style="font-size: 12px; color: #7f8c8d;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#7f8c8d" style="vertical-align: middle; margin-right: 5px;">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            15-40 часов
                        </div>
                        <a href="/products/" style="font-size: 14px; color: var(--accent_blue); text-decoration: none; font-weight: 500;">
                            Подробнее →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Карточка продукта 2 -->
            <div style="border: 1px solid rgba(0,0,0,0.1); border-radius: 6px; overflow: hidden; transition: all 0.3s;"
                 onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 5px 15px rgba(0,0,0,0.1)'"
                 onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                <div style="height: 120px; background: #2ecc71; position: relative;">
                    <div style="position: absolute; bottom: 10px; left: 10px; background: white; color: #2ecc71; padding: 3px 8px; border-radius: 12px; font-size: 12px; font-weight: bold;">
                        B2B
                    </div>
                </div>
                <div style="padding: 15px;">
                    <h3 style="margin: 0 0 10px 0; color: #2c3e50;">Корпоративные подписки</h3>
                    <p style="color: #7f8c8d; margin: 0 0 15px 0; font-size: 14px;">Обучение сотрудников от 500 руб./пользователь в месяц</p>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div style="font-size: 12px; color: #7f8c8d;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#7f8c8d" style="vertical-align: middle; margin-right: 5px;">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            Гибкие условия
                        </div>
                        <a href="/products/" style="font-size: 14px; color: var(--accent_blue); text-decoration: none; font-weight: 500;">
                            Подробнее →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Карточка продукта 3 -->
            <div style="border: 1px solid rgba(0,0,0,0.1); border-radius: 6px; overflow: hidden; transition: all 0.3s;"
                 onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 5px 15px rgba(0,0,0,0.1)'"
                 onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                <div style="height: 120px; background: #9b59b6; position: relative;">
                    <div style="position: absolute; bottom: 10px; left: 10px; background: white; color: #9b59b6; padding: 3px 8px; border-radius: 12px; font-size: 12px; font-weight: bold;">
                        P2P
                    </div>
                </div>
                <div style="padding: 15px;">
                    <h3 style="margin: 0 0 10px 0; color: #2c3e50;">Маркетплейс курсов</h3>
                    <p style="color: #7f8c8d; margin: 0 0 15px 0; font-size: 14px;">Площадка для авторов с комиссией всего 10-15%</p>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div style="font-size: 12px; color: #7f8c8d;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#7f8c8d" style="vertical-align: middle; margin-right: 5px;">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            Для экспертов
                        </div>
                        <a href="/products/" style="font-size: 14px; color: var(--accent_blue); text-decoration: none; font-weight: 500;">
                            Подробнее →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Блок преимуществ -->
    <section style="background: #f5f7fa; border-radius: 8px; padding: 30px; margin-bottom: 30px;">
        <h2 style="color: #2c3e50; margin-top: 0; text-align: center;">Почему выбирают нас</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; margin-top: 20px;">
            <div style="text-align: center; padding: 20px;">
                <div style="width: 60px; height: 60px; background: var(--accent_blue); border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                    <svg width="30" height="30" viewBox="0 0 24 24" fill="white">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                </div>
                <h3 style="margin: 10px 0; color: #2c3e50;">Российские кейсы</h3>
                <p style="color: #7f8c8d; margin: 0; font-size: 14px;">40% больше практических примеров из российской бизнес-среды</p>
            </div>
            <div style="text-align: center; padding: 20px;">
                <div style="width: 60px; height: 60px; background: #2ecc71; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                    <svg width="30" height="30" viewBox="0 0 24 24" fill="white">
                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                    </svg>
                </div>
                <h3 style="margin: 10px 0; color: #2c3e50;">AI-адаптация</h3>
                <p style="color: #7f8c8d; margin: 0; font-size: 14px;">Персонализированная программа обучения для каждого пользователя</p>
            </div>
            <div style="text-align: center; padding: 20px;">
                <div style="width: 60px; height: 60px; background: #9b59b6; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                    <svg width="30" height="30" viewBox="0 0 24 24" fill="white">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                </div>
                <h3 style="margin: 10px 0; color: #2c3e50;">Интеграция с 1С</h3>
                <p style="color: #7f8c8d; margin: 0; font-size: 14px;">Уникальная возможность работать с реальными бизнес-данными</p>
            </div>
            <div style="text-align: center; padding: 20px;">
                <div style="width: 60px; height: 60px; background: #e74c3c; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                    <svg width="30" height="30" viewBox="0 0 24 24" fill="white">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                </div>
                <h3 style="margin: 10px 0; color: #2c3e50;">Поддержка 24/7</h3>
                <p style="color: #7f8c8d; margin: 0; font-size: 14px;">Круглосуточная техническая поддержка для всех пользователей</p>
            </div>
        </div>
    </section>

    <!-- Блок призыва к действию -->
    <section style="background: var(--accent_blue); border-radius: 8px; padding: 40px; text-align: center; color: white; margin-bottom: 30px;">
        <h2 style="margin-top: 0; font-size: 28px;">Готовы начать обучение?</h2>
        <p style="font-size: 18px; margin-bottom: 25px;">Попробуйте бесплатные материалы или войдите для полного доступа</p>
        <div style="display: flex; justify-content: center; gap: 15px;">
            <a href="/products/" style="background: white; color: var(--accent_blue); padding: 12px 25px; border-radius: 4px; text-decoration: none; font-weight: bold; transition: all 0.3s;"
               onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 2px 10px rgba(0,0,0,0.1)'"
               onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                Бесплатный доступ
            </a>
            <a href="/login/" style="background: transparent; color: white; padding: 12px 25px; border-radius: 4px; text-decoration: none; border: 2px solid white; font-weight: bold; transition: all 0.3s;"
               onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'"
               onmouseout="this.style.backgroundColor='transparent'">
                Войти
            </a>
        </div>
    </section>


<style>
    /* Адаптивность */
    @media (max-width: 768px) {
        .expert-econom-container section > div {
            grid-template-columns: 1fr !important;
        }
        
        .expert-econom-container .company-header h1 {
            font-size: 28px;
        }
        
        .expert-econom-container .cta-buttons {
            flex-direction: column;
            gap: 10px;
        }
    }
</style>
<!-- <h3>Наша продукция</h3>
<?$APPLICATION->IncludeComponent("bitrix:furniture.catalog.index", "", array(
	"IBLOCK_TYPE" => "products",
	"IBLOCK_ID" => "2",
	"IBLOCK_BINDING" => "section",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "N"
	),
	false
);?> -->

</p><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>