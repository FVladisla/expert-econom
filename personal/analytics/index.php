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
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>