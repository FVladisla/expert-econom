<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("ЭкспертЭконом");
?>
<!-- Страница аналитики - personal/analytics/index.html -->
<div class="analytics-page" style="max-width: 1200px; margin: 0 auto; font-family: Arial, sans-serif; padding: 20px;">
    
    <!-- Шапка аналитики -->
    <div class="analytics-header" style="margin-bottom: 30px;">
        <h1 style="color: var(--primary); margin: 0 0 10px 0; display: flex; align-items: center;">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 15px;">
                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                <line x1="12" y1="22.08" x2="12" y2="12"></line>
            </svg>
            Аналитика обучения
        </h1>
        <p style="color: var(--gray); margin: 0;">Статистика вашей активности и прогресса</p>
    </div>

    <!-- Фильтры периода -->
    <div class="period-filters" style="display: flex; gap: 10px; margin-bottom: 30px; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
        <button class="period-btn active" data-period="week" 
                style="padding: 10px 20px; background: var(--accent_blue); color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">
            Неделя
        </button>
        <button class="period-btn" data-period="month"
                style="padding: 10px 20px; background: white; color: var(--dark); border: 1px solid #ddd; border-radius: 6px; cursor: pointer; font-weight: 500;">
            Месяц
        </button>
        <button class="period-btn" data-period="quarter"
                style="padding: 10px 20px; background: white; color: var(--dark); border: 1px solid #ddd; border-radius: 6px; cursor: pointer; font-weight: 500;">
            Квартал
        </button>
        <button class="period-btn" data-period="year"
                style="padding: 10px 20px; background: white; color: var(--dark); border: 1px solid #ddd; border-radius: 6px; cursor: pointer; font-weight: 500;">
            Год
        </button>
    </div>

    <!-- Карточки статистики -->
    <div class="stats-cards" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 30px;">
        
        <!-- Карточка 1: Пройдено курсов -->
        <div class="stat-card" style="background: white; border-radius: 10px; padding: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <div style="display: flex; align-items: center; margin-bottom: 15px;">
                <div style="width: 50px; height: 50px; background: rgba(52, 152, 219, 0.1); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--accent_blue)" stroke-width="2">
                        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                    </svg>
                </div>
                <div>
                    <div style="font-size: 12px; color: var(--gray);">Пройдено курсов</div>
                    <div style="font-size: 28px; font-weight: bold; color: var(--primary);" id="courses-completed">3</div>
                </div>
            </div>
            <div style="font-size: 13px; color: var(--gray);">+1 на этой неделе</div>
        </div>

        <!-- Карточка 2: Потрачено часов -->
        <div class="stat-card" style="background: white; border-radius: 10px; padding: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <div style="display: flex; align-items: center; margin-bottom: 15px;">
                <div style="width: 50px; height: 50px; background: rgba(46, 204, 113, 0.1); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2ecc71" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <div>
                    <div style="font-size: 12px; color: var(--gray);">Потрачено часов</div>
                    <div style="font-size: 28px; font-weight: bold; color: var(--primary);" id="hours-spent">42</div>
                </div>
            </div>
            <div style="font-size: 13px; color: var(--gray);">~6 часов в неделю</div>
        </div>

        <!-- Карточка 3: Средний балл -->
        <div class="stat-card" style="background: white; border-radius: 10px; padding: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <div style="display: flex; align-items: center; margin-bottom: 15px;">
                <div style="width: 50px; height: 50px; background: rgba(155, 89, 182, 0.1); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#9b59b6" stroke-width="2">
                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                    </svg>
                </div>
                <div>
                    <div style="font-size: 12px; color: var(--gray);">Средний балл</div>
                    <div style="font-size: 28px; font-weight: bold; color: var(--primary);" id="average-score">86.5</div>
                </div>
            </div>
            <div style="font-size: 13px; color: var(--gray);">Выше среднего на 12%</div>
        </div>

        <!-- Карточка 4: Активность -->
        <div class="stat-card" style="background: white; border-radius: 10px; padding: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <div style="display: flex; align-items: center; margin-bottom: 15px;">
                <div style="width: 50px; height: 50px; background: rgba(241, 196, 15, 0.1); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#f1c40f" stroke-width="2">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                    </svg>
                </div>
                <div>
                    <div style="font-size: 12px; color: var(--gray);">Уровень активности</div>
                    <div style="font-size: 28px; font-weight: bold; color: var(--primary);" id="activity-level">Высокий</div>
                </div>
            </div>
            <div style="font-size: 13px; color: var(--gray);">5 дней из 7 активны</div>
        </div>
    </div>

    <!-- Основной контент -->
    <div class="analytics-content" style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
        
        <!-- Левая колонка: Графики -->
        <div class="charts-section">
            
            <!-- График активности -->
            <div style="background: white; border-radius: 10px; padding: 25px; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3 style="margin: 0; color: var(--primary);">Активность по дням</h3>
                    <div style="font-size: 14px; color: var(--gray);">Часов обучения</div>
                </div>
                <div style="height: 250px; position: relative;">
                    <canvas id="activityChart"></canvas>
                </div>
            </div>

            <!-- Прогресс по курсам -->
            <div style="background: white; border-radius: 10px; padding: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <h3 style="margin: 0 0 20px 0; color: var(--primary);">Прогресс по курсам</h3>
                <div class="courses-progress">
                    
                    <div class="course-progress-item" style="margin-bottom: 20px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                            <span style="font-weight: 500; color: var(--dark);">Экономика предприятия</span>
                            <span style="color: var(--gray); font-size: 14px;">75%</span>
                        </div>
                        <div style="height: 8px; background: #eee; border-radius: 4px; overflow: hidden;">
                            <div style="width: 75%; height: 100%; background: var(--accent_blue); border-radius: 4px;"></div>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-top: 5px;">
                            <span style="font-size: 12px; color: var(--gray);">15/20 часов</span>
                            <span style="font-size: 12px; color: var(--gray);">Осталось 5ч</span>
                        </div>
                    </div>

                    <div class="course-progress-item" style="margin-bottom: 20px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                            <span style="font-weight: 500; color: var(--dark);">Маркетинг для начинающих</span>
                            <span style="color: var(--gray); font-size: 14px;">45%</span>
                        </div>
                        <div style="height: 8px; background: #eee; border-radius: 4px; overflow: hidden;">
                            <div style="width: 45%; height: 100%; background: #2ecc71; border-radius: 4px;"></div>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-top: 5px;">
                            <span style="font-size: 12px; color: var(--gray);">9/20 часов</span>
                            <span style="font-size: 12px; color: var(--gray);">Осталось 11ч</span>
                        </div>
                    </div>

                    <div class="course-progress-item" style="margin-bottom: 20px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                            <span style="font-weight: 500; color: var(--dark);">Финансовый анализ</span>
                            <span style="color: var(--gray); font-size: 14px;">100%</span>
                        </div>
                        <div style="height: 8px; background: #eee; border-radius: 4px; overflow: hidden;">
                            <div style="width: 100%; height: 100%; background: #9b59b6; border-radius: 4px;"></div>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-top: 5px;">
                            <span style="font-size: 12px; color: var(--gray);">25/25 часов</span>
                            <span style="font-size: 12px; color: #2ecc71;">Завершено ✓</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Правая колонка: Дополнительная статистика -->
        <div class="sidebar-section">
            
            <!-- Распределение времени -->
            <div style="background: white; border-radius: 10px; padding: 25px; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <h3 style="margin: 0 0 20px 0; color: var(--primary);">Распределение времени</h3>
                <div style="height: 200px; position: relative;">
                    <canvas id="timeDistributionChart"></canvas>
                </div>
                <div style="margin-top: 20px;">
                    <div style="display: flex; align-items: center; margin-bottom: 10px;">
                        <div style="width: 12px; height: 12px; background: var(--accent_blue); border-radius: 2px; margin-right: 10px;"></div>
                        <span style="font-size: 14px; color: var(--dark);">Теория - 60%</span>
                    </div>
                    <div style="display: flex; align-items: center; margin-bottom: 10px;">
                        <div style="width: 12px; height: 12px; background: #2ecc71; border-radius: 2px; margin-right: 10px;"></div>
                        <span style="font-size: 14px; color: var(--dark);">Практика - 25%</span>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <div style="width: 12px; height: 12px; background: #f1c40f; border-radius: 2px; margin-right: 10px;"></div>
                        <span style="font-size: 14px; color: var(--dark);">Тесты - 15%</span>
                    </div>
                </div>
            </div>

            <!-- Последняя активность -->
            <div style="background: white; border-radius: 10px; padding: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <h3 style="margin: 0 0 20px 0; color: var(--primary);">Последняя активность</h3>
                <div class="recent-activity">
                    
                    <div class="activity-item" style="display: flex; align-items: center; padding: 12px 0; border-bottom: 1px solid #eee;">
                        <div style="width: 32px; height: 32px; background: rgba(52, 152, 219, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--accent_blue)" stroke-width="2">
                                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                <polyline points="2 17 12 22 22 17"></polyline>
                                <polyline points="2 12 12 17 22 12"></polyline>
                            </svg>
                        </div>
                        <div style="flex: 1;">
                            <div style="font-size: 14px; font-weight: 500; color: var(--dark);">Завершен тест</div>
                            <div style="font-size: 12px; color: var(--gray);">Модуль 2, Финансы</div>
                        </div>
                        <div style="font-size: 12px; color: var(--gray);">2 ч назад</div>
                    </div>

                    <div class="activity-item" style="display: flex; align-items: center; padding: 12px 0; border-bottom: 1px solid #eee;">
                        <div style="width: 32px; height: 32px; background: rgba(46, 204, 113, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2ecc71" stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </div>
                        <div style="flex: 1;">
                            <div style="font-size: 14px; font-weight: 500; color: var(--dark);">Изучен урок</div>
                            <div style="font-size: 12px; color: var(--gray);">Введение в маркетинг</div>
                        </div>
                        <div style="font-size: 12px; color: var(--gray);">5 ч назад</div>
                    </div>

                    <div class="activity-item" style="display: flex; align-items: center; padding: 12px 0; border-bottom: 1px solid #eee;">
                        <div style="width: 32px; height: 32px; background: rgba(155, 89, 182, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#9b59b6" stroke-width="2">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div style="flex: 1;">
                            <div style="font-size: 14px; font-weight: 500; color: var(--dark);">Получен балл</div>
                            <div style="font-size: 12px; color: var(--gray);">92 из 100</div>
                        </div>
                        <div style="font-size: 12px; color: var(--gray);">Вчера</div>
                    </div>

                    <div class="activity-item" style="display: flex; align-items: center; padding: 12px 0;">
                        <div style="width: 32px; height: 32px; background: rgba(241, 196, 15, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#f1c40f" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <div style="flex: 1;">
                            <div style="font-size: 14px; font-weight: 500; color: var(--dark);">Начат курс</div>
                            <div style="font-size: 12px; color: var(--gray);">Новый курс</div>
                        </div>
                        <div style="font-size: 12px; color: var(--gray);">2 дня назад</div>
                    </div>

                </div>
            </div>

            <!-- Достижения -->
            <div style="background: white; border-radius: 10px; padding: 25px; margin-top: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <h3 style="margin: 0 0 20px 0; color: var(--primary);">Ваши достижения</h3>
                <div style="display: flex; flex-wrap: wrap; gap: 15px;">
                    <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #f1c40f, #f39c12); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px;">
                        🥇
                    </div>
                    <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #95a5a6, #7f8c8d); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px;">
                        📚
                    </div>
                    <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #3498db, #2980b9); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px;">
                        ⚡
                    </div>
                    <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #2ecc71, #27ae60); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px;">
                        🎯
                    </div>
                </div>
                <div style="margin-top: 15px; font-size: 13px; color: var(--gray);">
                    Получено 4 из 12 достижений
                </div>
            </div>

        </div>
    </div>
    <!-- Добавляем эту секцию в конец analytics-page, перед закрывающим div -->

    <!-- Секция сертификатов -->
    <div class="certificates-section" style="margin-top: 40px;">

        <!-- Заголовок с переключателем -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; padding-bottom: 20px; border-bottom: 1px solid rgba(0,0,0,0.1);">
            <h2 style="color: var(--primary); margin: 0; display: flex; align-items: center;">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 12px;">
                    <rect x="3" y="2" width="18" height="20" rx="2" ry="2"></rect>
                    <line x1="12" y1="10" x2="12" y2="16"></line>
                    <line x1="8" y1="12" x2="16" y2="12"></line>
                    <line x1="1" y1="10" x2="3" y2="10"></line>
                    <line x1="1" y1="14" x2="3" y2="14"></line>
                    <line x1="1" y1="18" x2="3" y2="18"></line>
                    <line x1="1" y1="22" x2="3" y2="22"></line>
                    <line x1="21" y1="10" x2="23" y2="10"></line>
                    <line x1="21" y1="14" x2="23" y2="14"></line>
                    <line x1="21" y1="18" x2="23" y2="18"></line>
                    <line x1="21" y1="22" x2="23" y2="22"></line>
                </svg>
                Ваши сертификаты
            </h2>
            
            <div style="display: flex; gap: 10px;">
                <button id="viewCertificates" class="cert-tab-btn active"
                        style="padding: 10px 20px; background: var(--accent_blue); color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">
                    Мои сертификаты
                </button>
                <button id="createCertificate" class="cert-tab-btn"
                        style="padding: 10px 20px; background: white; color: var(--dark); border: 1px solid #ddd; border-radius: 6px; cursor: pointer; font-weight: 500;">
                    Создать новый
                </button>
            </div>
        </div>

        <!-- Контейнер для сертификатов -->
        <div id="certificatesContainer" style="display: block;">
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 25px;">
                
                <!-- Сертификат 1 -->
                <div class="certificate-card" 
                    style="background: linear-gradient(135deg, #1a2980 0%, #26d0ce 100%); border-radius: 12px; padding: 25px; color: white; position: relative; overflow: hidden; box-shadow: 0 8px 30px rgba(26, 41, 128, 0.2);">
                    
                    <!-- Декоративные элементы -->
                    <div style="position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                    <div style="position: absolute; bottom: -30px; left: -30px; width: 100px; height: 100px; background: rgba(255,255,255,0.05); border-radius: 50%;"></div>
                    
                    <!-- Логотип -->
                    <div style="display: flex; align-items: center; margin-bottom: 20px; position: relative; z-index: 1;">
                        <div style="width: 50px; height: 50px; background: white; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                            <span style="font-size: 24px; color: #1a2980;">🎓</span>
                        </div>
                        <div>
                            <div style="font-size: 14px; opacity: 0.9;">Сертификат об окончании</div>
                            <div style="font-size: 16px; font-weight: bold;">#CER-2023-001</div>
                        </div>
                    </div>
                    
                    <!-- Основное содержимое -->
                    <div style="position: relative; z-index: 1;">
                        <div style="font-size: 22px; font-weight: bold; margin-bottom: 10px; line-height: 1.3;">
                            Экономика предприятия
                        </div>
                        <div style="font-size: 14px; opacity: 0.9; margin-bottom: 25px;">
                            Программа профессионального обучения
                        </div>
                        
                        <!-- Детали сертификата -->
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 25px;">
                            <div>
                                <div style="font-size: 12px; opacity: 0.8;">Дата выдачи</div>
                                <div style="font-size: 14px; font-weight: 500;">15.12.2023</div>
                            </div>
                            <div>
                                <div style="font-size: 12px; opacity: 0.8;">Оценка</div>
                                <div style="font-size: 14px; font-weight: 500;">92/100</div>
                            </div>
                        </div>
                        
                        <!-- Печать -->
                        <div style="display: flex; align-items: center; justify-content: space-between; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.2);">
                            <div>
                                <div style="font-size: 12px; opacity: 0.8;">Подпись директора</div>
                                <div style="font-size: 14px; font-weight: 500;">Иванов И.И.</div>
                            </div>
                            <div style="width: 60px; height: 60px; border: 2px solid white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 10px; text-align: center; padding: 5px;">
                                Печать
                            </div>
                        </div>
                    </div>
                    
                    <!-- Кнопки действий -->
                    <div style="position: absolute; top: 15px; right: 15px; display: flex; gap: 8px;">
                        <button onclick="downloadCertificate('CER-2023-001')" 
                                style="width: 36px; height: 36px; background: rgba(255,255,255,0.2); border: none; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; color: white; backdrop-filter: blur(5px);">
                            ⬇️
                        </button>
                        <button onclick="shareCertificate('CER-2023-001')" 
                                style="width: 36px; height: 36px; background: rgba(255,255,255,0.2); border: none; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; color: white; backdrop-filter: blur(5px);">
                            ↗️
                        </button>
                    </div>
                </div>

                <!-- Сертификат 2 -->
                <div class="certificate-card" 
                    style="background: linear-gradient(135deg, #FF512F 0%, #F09819 100%); border-radius: 12px; padding: 25px; color: white; position: relative; overflow: hidden; box-shadow: 0 8px 30px rgba(255, 81, 47, 0.2);">
                    
                    <div style="position: absolute; top: -50px; left: -50px; width: 150px; height: 150px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                    
                    <div style="display: flex; align-items: center; margin-bottom: 20px; position: relative; z-index: 1;">
                        <div style="width: 50px; height: 50px; background: white; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                            <span style="font-size: 24px; color: #FF512F;">📊</span>
                        </div>
                        <div>
                            <div style="font-size: 14px; opacity: 0.9;">Сертификат о прохождении</div>
                            <div style="font-size: 16px; font-weight: bold;">#CER-2023-002</div>
                        </div>
                    </div>
                    
                    <div style="position: relative; z-index: 1;">
                        <div style="font-size: 22px; font-weight: bold; margin-bottom: 10px; line-height: 1.3;">
                            Финансовый анализ
                        </div>
                        <div style="font-size: 14px; opacity: 0.9; margin-bottom: 25px;">
                            Продвинутый уровень
                        </div>
                        
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 25px;">
                            <div>
                                <div style="font-size: 12px; opacity: 0.8;">Дата выдачи</div>
                                <div style="font-size: 14px; font-weight: 500;">10.11.2023</div>
                            </div>
                            <div>
                                <div style="font-size: 12px; opacity: 0.8;">Длительность</div>
                                <div style="font-size: 14px; font-weight: 500;">25 часов</div>
                            </div>
                        </div>
                        
                        <div style="display: flex; align-items: center; justify-content: space-between; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.2);">
                            <div>
                                <div style="font-size: 12px; opacity: 0.8;">Подпись преподавателя</div>
                                <div style="font-size: 14px; font-weight: 500;">Петрова А.С.</div>
                            </div>
                            <div style="font-size: 32px;">🏅</div>
                        </div>
                    </div>
                    
                    <div style="position: absolute; top: 15px; right: 15px; display: flex; gap: 8px;">
                        <button onclick="downloadCertificate('CER-2023-002')" 
                                style="width: 36px; height: 36px; background: rgba(255,255,255,0.2); border: none; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; color: white; backdrop-filter: blur(5px);">
                            ⬇️
                        </button>
                    </div>
                </div>

                <!-- Сертификат 3 (недоступный) -->
                <div class="certificate-card locked" 
                    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 12px; padding: 25px; color: white; position: relative; overflow: hidden; opacity: 0.7; box-shadow: 0 8px 30px rgba(102, 126, 234, 0.2);">
                    
                    <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.3); backdrop-filter: blur(2px); z-index: 2;"></div>
                    
                    <!-- Замок -->
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 3; text-align: center;">
                        <div style="font-size: 48px; margin-bottom: 15px;">🔒</div>
                        <div style="font-size: 16px; font-weight: bold;">Доступен при 80% курса</div>
                        <div style="font-size: 14px; opacity: 0.9;">Маркетинг для начинающих</div>
                    </div>
                    
                    <div style="display: flex; align-items: center; margin-bottom: 20px; position: relative; z-index: 1;">
                        <div style="width: 50px; height: 50px; background: white; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 15px; opacity: 0.5;">
                            <span style="font-size: 24px; color: #667eea;">🎯</span>
                        </div>
                        <div>
                            <div style="font-size: 14px; opacity: 0.7;">Сертификат об окончании</div>
                            <div style="font-size: 16px; font-weight: bold;">#CER-2024-001</div>
                        </div>
                    </div>
                    
                    <div style="position: relative; z-index: 1;">
                        <div style="font-size: 22px; font-weight: bold; margin-bottom: 10px; line-height: 1.3;">
                            Маркетинг для начинающих
                        </div>
                        <div style="font-size: 14px; opacity: 0.9; margin-bottom: 25px;">
                            Базовый курс
                        </div>
                        
                        <!-- Прогресс -->
                        <div style="margin-bottom: 20px;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span style="font-size: 12px; opacity: 0.8;">Прогресс</span>
                                <span style="font-size: 12px; opacity: 0.8;">45%</span>
                            </div>
                            <div style="height: 6px; background: rgba(255,255,255,0.2); border-radius: 3px; overflow: hidden;">
                                <div style="width: 45%; height: 100%; background: white;"></div>
                            </div>
                        </div>
                        
                        <div style="font-size: 12px; text-align: center; padding: 10px; background: rgba(255,255,255,0.1); border-radius: 6px;">
                            Завершите курс для получения сертификата
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Пустой список -->
            <div id="emptyCertificates" style="display: none; text-align: center; padding: 60px 20px;">
                <div style="font-size: 72px; margin-bottom: 20px;">📄</div>
                <h3 style="color: var(--primary); margin-bottom: 10px;">Сертификатов пока нет</h3>
                <p style="color: var(--gray); max-width: 500px; margin: 0 auto 30px;">
                    Завершите курс обучения, чтобы получить ваш первый сертификат.
                    Сертификаты автоматически создаются при достижении 80% прогресса курса.
                </p>
                <button onclick="switchToCreate()" 
                        style="padding: 12px 30px; background: var(--accent_blue); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 500;">
                    Посмотреть доступные курсы
                </button>
            </div>
        </div>

        <!-- Контейнер для создания сертификата -->
        <div id="createCertificateContainer" style="display: none;">
            <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: 0 2px 15px rgba(0,0,0,0.05);">
                
                <div style="max-width: 600px; margin: 0 auto;">
                    <h3 style="color: var(--primary); margin-top: 0; margin-bottom: 25px; text-align: center;">
                        Создание сертификата на основе вашей статистики
                    </h3>
                    
                    <!-- Выбор курса -->
                    <div style="margin-bottom: 25px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 500; color: var(--dark);">Выберите курс</label>
                        <select id="certificateCourse" style="width: 100%; padding: 12px 15px; border: 2px solid #e9ecef; border-radius: 8px; font-size: 15px;">
                            <option value="">-- Выберите курс для сертификата --</option>
                            <option value="1">Экономика предприятия (75% готово)</option>
                            <option value="2">Маркетинг для начинающих (45% готово)</option>
                            <option value="3">Финансовый анализ (100% готово)</option>
                        </select>
                    </div>
                    
                    <!-- Предпросмотр сертификата -->
                    <div id="certificatePreview" style="display: none; margin-bottom: 30px; padding: 20px; background: #f8f9fa; border-radius: 10px; border: 2px dashed #dee2e6;">
                        <div style="text-align: center; margin-bottom: 20px;">
                            <div style="font-size: 14px; color: var(--gray);">Предпросмотр сертификата</div>
                        </div>
                        
                        <div style="background: white; border-radius: 8px; padding: 20px; border: 1px solid #e9ecef;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                                <div>
                                    <div style="font-size: 18px; font-weight: bold; color: var(--primary);" id="previewCourseName">Название курса</div>
                                    <div style="font-size: 14px; color: var(--gray);" id="previewCourseDesc">Описание курса</div>
                                </div>
                                <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #3498db, #2980b9); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px;">
                                    🎓
                                </div>
                            </div>
                            
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                                <div>
                                    <div style="font-size: 12px; color: var(--gray);">Дата начала</div>
                                    <div style="font-size: 14px; font-weight: 500;">01.12.2023</div>
                                </div>
                                <div>
                                    <div style="font-size: 12px; color: var(--gray);">Прогресс</div>
                                    <div style="font-size: 14px; font-weight: 500;" id="previewProgress">0%</div>
                                </div>
                            </div>
                            
                            <div style="height: 6px; background: #e9ecef; border-radius: 3px; margin-bottom: 20px; overflow: hidden;">
                                <div id="previewProgressBar" style="width: 0%; height: 100%; background: var(--accent_blue);"></div>
                            </div>
                            
                            <div style="font-size: 13px; color: var(--gray); text-align: center; padding: 10px; background: #f8f9fa; border-radius: 6px;">
                                <span id="previewStatusText">Курс не выбран</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Настройки сертификата -->
                    <div id="certificateSettings" style="display: none;">
                        <div style="margin-bottom: 25px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 500; color: var(--dark);">Дизайн сертификата</label>
                            <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="radio" name="design" value="classic" checked style="margin-right: 8px;">
                                    <div style="width: 100px; height: 70px; background: linear-gradient(135deg, #1a2980, #26d0ce); border-radius: 6px;"></div>
                                    <span style="margin-left: 8px;">Классический</span>
                                </label>
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="radio" name="design" value="premium" style="margin-right: 8px;">
                                    <div style="width: 100px; height: 70px; background: linear-gradient(135deg, #FF512F, #F09819); border-radius: 6px;"></div>
                                    <span style="margin-left: 8px;">Премиум</span>
                                </label>
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="radio" name="design" value="modern" style="margin-right: 8px;">
                                    <div style="width: 100px; height: 70px; background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 6px;"></div>
                                    <span style="margin-left: 8px;">Современный</span>
                                </label>
                            </div>
                        </div>
                        
                        <div style="margin-bottom: 30px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 500; color: var(--dark);">Дополнительная информация</label>
                            <div style="display: flex; gap: 15px;">
                                <label style="display: flex; align-items: center;">
                                    <input type="checkbox" id="includeScore" checked style="margin-right: 8px;">
                                    <span>Включить оценку</span>
                                </label>
                                <label style="display: flex; align-items: center;">
                                    <input type="checkbox" id="includeHours" checked style="margin-right: 8px;">
                                    <span>Включить часы обучения</span>
                                </label>
                                <label style="display: flex; align-items: center;">
                                    <input type="checkbox" id="includeDate" checked style="margin-right: 8px;">
                                    <span>Включить дату выдачи</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Кнопки действий -->
                    <div style="display: flex; gap: 15px; justify-content: center;">
                        <button id="generateCertificateBtn" onclick="generateCertificate()" 
                                style="padding: 14px 40px; background: var(--accent_blue); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 500; display: flex; align-items: center; gap: 10px;"
                                disabled>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                            Создать сертификат
                        </button>
                        
                        <button onclick="switchToView()" 
                                style="padding: 14px 30px; background: white; color: var(--dark); border: 2px solid #dee2e6; border-radius: 8px; cursor: pointer; font-weight: 500;">
                            Отмена
                        </button>
                    </div>
                    
                    <!-- Сообщение о результате -->
                    <div id="certificateResult" style="display: none; margin-top: 25px; padding: 15px; border-radius: 8px; text-align: center;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Модальное окно для просмотра сертификата -->
    <div id="certificateModal" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); z-index: 10000; align-items: center; justify-content: center; padding: 20px;">
        <div style="background: white; border-radius: 12px; max-width: 800px; width: 100%; max-height: 90vh; overflow: auto; position: relative;">
            <button onclick="closeCertificateModal()" 
                    style="position: absolute; top: 15px; right: 15px; width: 40px; height: 40px; background: rgba(0,0,0,0.1); border: none; border-radius: 50%; cursor: pointer; font-size: 20px; z-index: 10;">
                ×
            </button>
            <div id="modalCertificateContent"></div>
        </div>
    </div>
</div>

<!-- Подключаем Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
/* Основные стили */
#sidebar{
    display:none;
}
#workarea{
    width: 100% !important;
}
.analytics-page {
    --primary: #2c3e50;
    --accent_blue: #3498db;
    --dark: #34495e;
    --gray: #7f8c8d;
}

/* Анимации */
.stat-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1) !important;
}

.period-btn {
    transition: all 0.3s ease;
}

.period-btn.active {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
}

.activity-item {
    transition: background-color 0.2s;
}

.activity-item:hover {
    background-color: #f9f9f9;
}

/* Адаптивность */
@media (max-width: 992px) {
    .analytics-content {
        grid-template-columns: 1fr !important;
    }
    
    .stats-cards {
        grid-template-columns: repeat(2, 1fr) !important;
    }
}

@media (max-width: 768px) {
    .stats-cards {
        grid-template-columns: 1fr !important;
    }
    
    .period-filters {
        flex-wrap: wrap;
    }
    
    .period-btn {
        flex: 1;
        min-width: 80px;
    }
}

.certificate-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
    position: relative;
}

.certificate-card:not(.locked):hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2) !important;
}

.cert-tab-btn {
    transition: all 0.3s ease;
}

.cert-tab-btn.active {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
}

.cert-tab-btn:not(.active):hover {
    border-color: var(--accent_blue) !important;
    color: var(--accent_blue) !important;
}

/* Анимация для генерации сертификата */
@keyframes generatePulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

.generating {
    animation: generatePulse 1s infinite;
}

/* Адаптивность для сертификатов */
@media (max-width: 768px) {
    .certificates-section .cert-tab-btn {
        padding: 8px 15px !important;
        font-size: 14px;
    }
    
    .certificate-card {
        grid-column: 1 / -1;
    }
    
    #certificatePreview {
        padding: 15px !important;
    }
}

</style>

<script>
// Фейковые данные для разных периодов
const fakeData = {
    week: {
        courses: 3,
        hours: 42,
        score: 86.5,
        activity: 'Высокий',
        chart: {
            labels: ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс'],
            data: [2.5, 4, 6, 5.5, 7, 3, 1.5]
        }
    },
    month: {
        courses: 5,
        hours: 120,
        score: 84.2,
        activity: 'Средний',
        chart: {
            labels: ['Нед 1', 'Нед 2', 'Нед 3', 'Нед 4'],
            data: [15, 25, 40, 40]
        }
    },
    quarter: {
        courses: 8,
        hours: 320,
        score: 82.8,
        activity: 'Высокий',
        chart: {
            labels: ['Март', 'Апрель', 'Май'],
            data: [90, 110, 120]
        }
    },
    year: {
        courses: 15,
        hours: 850,
        score: 81.5,
        activity: 'Постоянный',
        chart: {
            labels: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
            data: [60, 65, 70, 75, 80, 85, 70, 75, 80, 85, 90, 95]
        }
    }
};

let activityChart, timeChart;

// Инициализация графиков
document.addEventListener('DOMContentLoaded', function() {
    initCharts();
    setupEventListeners();
    updateData('week');
});

// Инициализация графиков
function initCharts() {
    const ctx1 = document.getElementById('activityChart').getContext('2d');
    const ctx2 = document.getElementById('timeDistributionChart').getContext('2d');
    
    // График активности
    activityChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Часы обучения',
                data: [],
                backgroundColor: 'rgba(52, 152, 219, 0.7)',
                borderColor: 'rgba(52, 152, 219, 1)',
                borderWidth: 1,
                borderRadius: 4,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: true,
                        color: 'rgba(0,0,0,0.05)'
                    },
                    ticks: {
                        callback: function(value) {
                            return value + 'ч';
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
    
    // Круговая диаграмма распределения времени
    timeChart = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Теория', 'Практика', 'Тесты'],
            datasets: [{
                data: [60, 25, 15],
                backgroundColor: [
                    'rgba(52, 152, 219, 0.8)',
                    'rgba(46, 204, 113, 0.8)',
                    'rgba(241, 196, 15, 0.8)'
                ],
                borderColor: [
                    'rgba(52, 152, 219, 1)',
                    'rgba(46, 204, 113, 1)',
                    'rgba(241, 196, 15, 1)'
                ],
                borderWidth: 2,
                hoverOffset: 15
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '65%',
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.label + ': ' + context.raw + '%';
                        }
                    }
                }
            }
        }
    });
}

// Настройка обработчиков событий
function setupEventListeners() {
    // Кнопки фильтра периода
    document.querySelectorAll('.period-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const period = this.dataset.period;
            
            // Убираем активный класс у всех кнопок
            document.querySelectorAll('.period-btn').forEach(b => {
                b.classList.remove('active');
                b.style.background = 'white';
                b.style.color = 'var(--dark)';
                b.style.border = '1px solid #ddd';
            });
            
            // Добавляем активный класс текущей кнопке
            this.classList.add('active');
            this.style.background = 'var(--accent_blue)';
            this.style.color = 'white';
            this.style.border = 'none';
            
            // Обновляем данные
            updateData(period);
        });
    });
    
    // Анимация при наведении на карточки
    document.querySelectorAll('.stat-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
}

// Обновление данных при смене периода
function updateData(period) {
    const data = fakeData[period];
    
    // Обновляем карточки статистики
    document.getElementById('courses-completed').textContent = data.courses;
    document.getElementById('hours-spent').textContent = data.hours;
    document.getElementById('average-score').textContent = data.score;
    document.getElementById('activity-level').textContent = data.activity;
    
    // Обновляем график
    activityChart.data.labels = data.chart.labels;
    activityChart.data.datasets[0].data = data.chart.data;
    activityChart.update();
    
    // Показываем уведомление об обновлении
    showNotification(`Данные обновлены за период: ${getPeriodName(period)}`);
}

// Получение названия периода
function getPeriodName(period) {
    const names = {
        week: 'неделю',
        month: 'месяц',
        quarter: 'квартал',
        year: 'год'
    };
    return names[period] || 'период';
}

// Показать уведомление
function showNotification(message) {
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #27ae60;
        color: white;
        padding: 12px 20px;
        border-radius: 6px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        z-index: 1000;
        animation: slideIn 0.3s ease;
        font-size: 14px;
    `;
    
    notification.innerHTML = `
        <div style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
            ${message}
        </div>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Добавляем анимации для уведомлений
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Функция для обновления прогресса курсов (можно вызвать извне)
window.updateCourseProgress = function(courseId, progress) {
    const progressElements = document.querySelectorAll('.course-progress-item');
    progressElements.forEach(el => {
        const courseName = el.querySelector('span:first-child').textContent;
        if (courseName.includes(courseId)) {
            const progressBar = el.querySelector('div[style*="height: 8px;"] > div');
            const percentSpan = el.querySelector('span:last-child');
            
            progressBar.style.width = progress + '%';
            percentSpan.textContent = progress + '%';
        }
    });
    
    showNotification('Прогресс курса обновлен!');
};

// Функция для добавления новой активности
window.addActivity = function(type, title, description) {
    const recentActivity = document.querySelector('.recent-activity');
    const now = new Date();
    const timeAgo = 'Только что';
    
    const icons = {
        'lesson': '📚',
        'test': '📝',
        'course': '🎓',
        'achievement': '🏆'
    };
    
    const colors = {
        'lesson': 'var(--accent_blue)',
        'test': '#2ecc71',
        'course': '#9b59b6',
        'achievement': '#f1c40f'
    };
    
    const activityHTML = `
        <div class="activity-item" style="display: flex; align-items: center; padding: 12px 0; border-bottom: 1px solid #eee;">
            <div style="width: 32px; height: 32px; background: ${colors[type] ? colors[type] + '15' : 'rgba(0,0,0,0.1)'}; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                ${icons[type] || '📊'}
            </div>
            <div style="flex: 1;">
                <div style="font-size: 14px; font-weight: 500; color: var(--dark);">${title}</div>
                <div style="font-size: 12px; color: var(--gray);">${description}</div>
            </div>
            <div style="font-size: 12px; color: var(--gray);">${timeAgo}</div>
        </div>
    `;
    
    recentActivity.insertAdjacentHTML('afterbegin', activityHTML);
    showNotification('Добавлена новая активность!');
};
</script>

<script>
// Данные курсов для сертификатов
const courseData = {
    '1': {
        name: 'Экономика предприятия',
        description: 'Программа профессионального обучения',
        progress: 75,
        hours: 15,
        score: 92,
        status: 'available',
        completed: true
    },
    '2': {
        name: 'Маркетинг для начинающих',
        description: 'Базовый курс',
        progress: 45,
        hours: 9,
        score: 0,
        status: 'locked',
        completed: false
    },
    '3': {
        name: 'Финансовый анализ',
        description: 'Продвинутый уровень',
        progress: 100,
        hours: 25,
        score: 88,
        status: 'available',
        completed: true
    }
};

// Функция инициализации сертификатов
function initCertificates() {
    console.log('Инициализация сертификатов...');
    
    // Находим элементы на странице
    const viewBtn = document.getElementById('viewCertificates');
    const createBtn = document.getElementById('createCertificate');
    const courseSelect = document.getElementById('certificateCourse');
    
    // Если элементы существуют, настраиваем обработчики
    if (viewBtn && createBtn) {
        viewBtn.addEventListener('click', switchToView);
        createBtn.addEventListener('click', switchToCreate);
        
        // Устанавливаем активную вкладку по умолчанию
        switchToView();
    }
    
    if (courseSelect) {
        courseSelect.addEventListener('change', function() {
            updateCertificatePreview(this.value);
        });
    }
    
    // Назначаем обработчики для существующих сертификатов
    document.querySelectorAll('.certificate-card:not(.locked)').forEach(card => {
        card.addEventListener('click', function(e) {
            // Не открываем при клике на кнопки внутри
            if (e.target.tagName === 'BUTTON' || e.target.closest('button')) {
                return;
            }
            viewCertificate(this);
        });
    });
    
    // Обработчики для кнопок в сертификатах
    document.querySelectorAll('.certificate-card button').forEach(btn => {
        if (btn.onclick) return; // Если уже есть обработчик
        
        if (btn.textContent.includes('⬇️')) {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const card = this.closest('.certificate-card');
                const certId = card.querySelector('div:nth-child(2) > div:nth-child(2)').textContent;
                downloadCertificate(certId);
            });
        }
        
        if (btn.textContent.includes('↗️')) {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const card = this.closest('.certificate-card');
                const certId = card.querySelector('div:nth-child(2) > div:nth-child(2)').textContent;
                shareCertificate(certId);
            });
        }
    });
}

// Переключение на просмотр сертификатов
function switchToView() {
    const certificatesContainer = document.getElementById('certificatesContainer');
    const createContainer = document.getElementById('createCertificateContainer');
    const viewBtn = document.getElementById('viewCertificates');
    const createBtn = document.getElementById('createCertificate');
    
    if (!certificatesContainer || !createContainer) return;
    
    certificatesContainer.style.display = 'block';
    createContainer.style.display = 'none';
    
    // Обновляем стили кнопок
    if (viewBtn) {
        viewBtn.classList.add('active');
        viewBtn.style.background = 'var(--accent_blue)';
        viewBtn.style.color = 'white';
        viewBtn.style.border = 'none';
    }
    
    if (createBtn) {
        createBtn.classList.remove('active');
        createBtn.style.background = 'white';
        createBtn.style.color = 'var(--dark)';
        createBtn.style.border = '1px solid #ddd';
    }
}

// Переключение на создание сертификата
function switchToCreate() {
    const certificatesContainer = document.getElementById('certificatesContainer');
    const createContainer = document.getElementById('createCertificateContainer');
    const viewBtn = document.getElementById('viewCertificates');
    const createBtn = document.getElementById('createCertificate');
    
    if (!certificatesContainer || !createContainer) return;
    
    certificatesContainer.style.display = 'none';
    createContainer.style.display = 'block';
    
    // Обновляем стили кнопок
    if (createBtn) {
        createBtn.classList.add('active');
        createBtn.style.background = 'var(--accent_blue)';
        createBtn.style.color = 'white';
        createBtn.style.border = 'none';
    }
    
    if (viewBtn) {
        viewBtn.classList.remove('active');
        viewBtn.style.background = 'white';
        viewBtn.style.color = 'var(--dark)';
        viewBtn.style.border = '1px solid #ddd';
    }
    
    // Сброс формы
    const courseSelect = document.getElementById('certificateCourse');
    const preview = document.getElementById('certificatePreview');
    const settings = document.getElementById('certificateSettings');
    const generateBtn = document.getElementById('generateCertificateBtn');
    
    if (courseSelect) courseSelect.value = '';
    if (preview) preview.style.display = 'none';
    if (settings) settings.style.display = 'none';
    if (generateBtn) generateBtn.disabled = true;
}

// Обновление предпросмотра сертификата
function updateCertificatePreview(courseId) {
    const preview = document.getElementById('certificatePreview');
    const settings = document.getElementById('certificateSettings');
    const generateBtn = document.getElementById('generateCertificateBtn');
    
    if (!preview || !settings || !generateBtn) return;
    
    if (!courseId) {
        preview.style.display = 'none';
        settings.style.display = 'none';
        generateBtn.disabled = true;
        return;
    }
    
    const course = courseData[courseId];
    
    if (!course) {
        preview.style.display = 'none';
        settings.style.display = 'none';
        generateBtn.disabled = true;
        return;
    }
    
    // Обновляем предпросмотр
    const courseName = document.getElementById('previewCourseName');
    const courseDesc = document.getElementById('previewCourseDesc');
    const progressText = document.getElementById('previewProgress');
    const progressBar = document.getElementById('previewProgressBar');
    const statusText = document.getElementById('previewStatusText');
    
    if (courseName) courseName.textContent = course.name;
    if (courseDesc) courseDesc.textContent = course.description;
    if (progressText) progressText.textContent = course.progress + '%';
    if (progressBar) progressBar.style.width = course.progress + '%';
    
    let statusMsg = '';
    let canGenerate = false;
    
    if (course.progress >= 80) {
        statusMsg = '✅ Курс готов для создания сертификата';
        canGenerate = true;
    } else if (course.progress >= 50) {
        statusMsg = '⚠️ Завершите еще ' + (80 - course.progress) + '% курса для сертификата';
        canGenerate = false;
    } else {
        statusMsg = '❌ Для сертификата необходимо минимум 80% прогресса';
        canGenerate = false;
    }
    
    if (statusText) statusText.textContent = statusMsg;
    
    preview.style.display = 'block';
    settings.style.display = canGenerate ? 'block' : 'none';
    generateBtn.disabled = !canGenerate;
    
    // Обновляем кнопку генерации
    if (generateBtn) {
        generateBtn.innerHTML = canGenerate ? 
            '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Создать сертификат' :
            '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg> Недоступно';
    }
}

// Генерация сертификата
function generateCertificate() {
    const courseSelect = document.getElementById('certificateCourse');
    const generateBtn = document.getElementById('generateCertificateBtn');
    const resultDiv = document.getElementById('certificateResult');
    
    if (!courseSelect || !generateBtn || !resultDiv) return;
    
    const courseId = courseSelect.value;
    const course = courseData[courseId];
    
    if (!course || course.progress < 80) {
        alert('Курс не доступен для создания сертификата');
        return;
    }
    
    const design = document.querySelector('input[name="design"]:checked')?.value || 'classic';
    const includeScore = document.getElementById('includeScore')?.checked || false;
    const includeHours = document.getElementById('includeHours')?.checked || false;
    const includeDate = document.getElementById('includeDate')?.checked || false;
    
    // Показываем анимацию генерации
    const originalText = generateBtn.innerHTML;
    generateBtn.innerHTML = '⏳ Генерация...';
    generateBtn.classList.add('generating');
    generateBtn.disabled = true;
    
    // Имитация процесса генерации (2 секунды)
    setTimeout(() => {
        // Создаем ID сертификата
        const certId = 'CER-' + new Date().getFullYear() + '-' + 
                      String(Math.floor(Math.random() * 1000)).padStart(3, '0');
        
        // Показываем результат
        resultDiv.style.display = 'block';
        resultDiv.style.background = '#d4edda';
        resultDiv.style.color = '#155724';
        resultDiv.style.border = '1px solid #c3e6cb';
        resultDiv.style.borderRadius = '8px';
        resultDiv.style.padding = '15px';
        resultDiv.style.marginTop = '25px';
        
        resultDiv.innerHTML = `
            <div style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                <div>
                    <div style="font-weight: 500;">Сертификат успешно создан!</div>
                    <div style="font-size: 14px;">ID: ${certId}</div>
                </div>
            </div>
            <div style="margin-top: 10px; text-align: center;">
                <button onclick="viewNewCertificate('${certId}', '${courseId}', '${design}')" 
                        style="padding: 8px 20px; background: #28a745; color: white; border: none; border-radius: 6px; cursor: pointer; margin-right: 10px;">
                    Посмотреть
                </button>
                <button onclick="downloadCertificate('${certId}')" 
                        style="padding: 8px 20px; background: white; color: #28a745; border: 1px solid #28a745; border-radius: 6px; cursor: pointer;">
                    Скачать
                </button>
            </div>
        `;
        
        // Возвращаем кнопку в исходное состояние
        generateBtn.innerHTML = originalText;
        generateBtn.classList.remove('generating');
        generateBtn.disabled = false;
        
        // Показываем уведомление
        showNotification(`Сертификат "${course.name}" успешно создан!`);
        
        // Добавляем в историю активности (если функция существует)
        if (typeof window.addActivity === 'function') {
            window.addActivity('achievement', 'Получен сертификат', course.name);
        }
        
    }, 2000);
}

// Просмотр нового сертификата
function viewNewCertificate(certId, courseId, design) {
    const course = courseData[courseId];
    const modal = document.getElementById('certificateModal');
    const modalContent = document.getElementById('modalCertificateContent');
    
    if (!modal || !modalContent) return;
    
    const designs = {
        classic: {
            gradient: 'linear-gradient(135deg, #1a2980 0%, #26d0ce 100%)',
            icon: '🎓'
        },
        premium: {
            gradient: 'linear-gradient(135deg, #FF512F 0%, #F09819 100%)',
            icon: '🏅'
        },
        modern: {
            gradient: 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
            icon: '📜'
        }
    };
    
    const selectedDesign = designs[design] || designs.classic;
    const currentDate = new Date().toLocaleDateString('ru-RU');
    
    const certificateHTML = `
        <div style="padding: 40px; color: white; background: ${selectedDesign.gradient}; min-height: 500px; display: flex; flex-direction: column; justify-content: center;">
            <div style="text-align: center; margin-bottom: 40px;">
                <div style="font-size: 48px; margin-bottom: 20px;">${selectedDesign.icon}</div>
                <div style="font-size: 14px; opacity: 0.9; letter-spacing: 2px;">СЕРТИФИКАТ</div>
                <div style="font-size: 10px; opacity: 0.7;">№ ${certId}</div>
            </div>
            
            <div style="text-align: center; margin-bottom: 40px;">
                <div style="font-size: 28px; font-weight: bold; margin-bottom: 15px;">НАСТОЯЩИМ УДОСТОВЕРЯЕТСЯ, ЧТО</div>
                <div style="font-size: 36px; font-weight: bold; margin-bottom: 10px; color: #FFD700;">Иван Иванов</div>
                <div style="font-size: 20px; margin-bottom: 30px;">успешно завершил(а) курс</div>
                <div style="font-size: 32px; font-weight: bold; margin-bottom: 30px; text-decoration: underline;">«${course.name}»</div>
            </div>
            
            <div style="display: flex; justify-content: space-between; margin-top: 40px;">
                <div style="text-align: center;">
                    <div style="height: 1px; width: 150px; background: white; margin: 0 auto 10px;"></div>
                    <div style="font-size: 14px;">Директор учебного центра</div>
                    <div style="font-size: 16px; font-weight: bold;">Иванов И.И.</div>
                </div>
                
                <div style="text-align: center;">
                    <div style="width: 100px; height: 100px; border: 2px solid white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; margin: 0 auto 10px;">
                        ПЕЧАТЬ<br>ОРГАНИЗАЦИИ
                    </div>
                    <div style="font-size: 14px;">${currentDate}</div>
                </div>
                
                <div style="text-align: center;">
                    <div style="height: 1px; width: 150px; background: white; margin: 0 auto 10px;"></div>
                    <div style="font-size: 14px;">Куратор курса</div>
                    <div style="font-size: 16px; font-weight: bold;">Петрова А.С.</div>
                </div>
            </div>
        </div>
    `;
    
    modalContent.innerHTML = certificateHTML;
    modal.style.display = 'flex';
}

// Просмотр существующего сертификата
function viewCertificate(card) {
    const certIdElement = card.querySelector('div:nth-child(2) > div:nth-child(2)');
    const courseNameElement = card.querySelector('div:nth-child(3) > div:nth-child(1)');
    
    if (!certIdElement || !courseNameElement) return;
    
    const certId = certIdElement.textContent;
    const courseName = courseNameElement.textContent;
    
    // Используем дизайн из карточки
    const background = card.style.background;
    const design = background.includes('#1a2980') ? 'classic' : 
                   background.includes('#FF512F') ? 'premium' : 'modern';
    
    // Находим ID курса по названию
    let courseId = '1';
    for (const id in courseData) {
        if (courseData[id].name === courseName) {
            courseId = id;
            break;
        }
    }
    
    viewNewCertificate(certId, courseId, design);
}

// Закрытие модального окна
function closeCertificateModal() {
    const modal = document.getElementById('certificateModal');
    if (modal) {
        modal.style.display = 'none';
    }
}

// Скачивание сертификата
function downloadCertificate(certId) {
    showNotification(`Начинается скачивание сертификата ${certId}...`);
    
    // Имитация скачивания
    setTimeout(() => {
        showNotification(`Сертификат ${certId} успешно скачан!`);
    }, 1000);
}

// Поделиться сертификатом
function shareCertificate(certId) {
    if (navigator.share) {
        navigator.share({
            title: 'Мой сертификат об обучении',
            text: 'Посмотрите мой сертификат об окончании курса!',
            url: window.location.href
        });
    } else {
        // Копирование ссылки в буфер обмена
        const shareText = `Мой сертификат ${certId}: ${window.location.href}`;
        navigator.clipboard.writeText(shareText).then(() => {
            showNotification('Ссылка на сертификат скопирована в буфер обмена!');
        }).catch(() => {
            alert('Скопируйте ссылку вручную: ' + shareText);
        });
    }
}

// Показать уведомление
function showNotification(message) {
    // Проверяем, существует ли функция showNotification в analytics
    if (typeof window.showNotification === 'function') {
        window.showNotification(message);
        return;
    }
    
    // Создаем свое уведомление
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #27ae60;
        color: white;
        padding: 12px 20px;
        border-radius: 6px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        z-index: 1000;
        animation: slideIn 0.3s ease;
        font-size: 14px;
        max-width: 300px;
    `;
    
    notification.innerHTML = `
        <div style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Добавляем стили для анимации, если их нет
    if (!document.querySelector('#notification-styles')) {
        const style = document.createElement('style');
        style.id = 'notification-styles';
        style.textContent = `
            @keyframes slideIn {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            @keyframes slideOut {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }
    
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => {
            if (notification.parentNode) {
                document.body.removeChild(notification);
            }
        }, 300);
    }, 3000);
}

// Функция для добавления нового сертификата
window.addCertificate = function(courseName, score, date) {
    showNotification(`Новый сертификат добавлен: ${courseName}`);
    return true;
};

// Функция для проверки доступности сертификата
window.checkCertificateAvailability = function(courseId) {
    const course = courseData[courseId];
    return course && course.progress >= 80;
};

// Инициализация при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
    console.log('Страница загружена, инициализируем сертификаты...');
    initCertificates();
});

// Экспортируем функции для глобального использования
window.switchToView = switchToView;
window.switchToCreate = switchToCreate;
window.generateCertificate = generateCertificate;
window.viewNewCertificate = viewNewCertificate;
window.closeCertificateModal = closeCertificateModal;
window.downloadCertificate = downloadCertificate;
window.shareCertificate = shareCertificate;
</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>