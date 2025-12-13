<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("ЭкспертЭконом");
?>
<div class="constructor-container" style="max-width: 1200px; margin: 0 auto; font-family: Arial, sans-serif; padding: 20px;">
    
    <!-- Шапка конструктора -->
    <div class="constructor-header" style="margin-bottom: 30px;">
        <h1 style="color: var(--primary); margin: 0 0 10px 0; display: flex; align-items: center;">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 10px;">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                <circle cx="12" cy="9" r="1"></circle>
                <path d="M11 12h2v4h-2z"></path>
                <path d="M14 6l-4 4M10 6l4 4"></path>
            </svg>
            Конструктор курсов
        </h1>
        <p style="color: var(--gray); margin: 0;">Создавайте и редактируйте курсы для вашей платформы</p>
    </div>
    <!-- Основная сетка -->
    <div class="constructor-grid" style="display: grid; grid-template-columns: 300px 1fr; gap: 30px; min-height: 600px;">
        
        <!-- Левая панель - список курсов/разделов -->
        <div class="constructor-sidebar" style="background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); overflow: hidden; display: flex; flex-direction: column;">
            
            <!-- Заголовок панели -->
            <div style="padding: 20px; border-bottom: 1px solid rgba(0,0,0,0.1);">
                <h3 style="margin: 0 0 15px 0; color: var(--primary);">Ваши курсы</h3>
                <button class="btn-new-course" style="width: 100%; padding: 10px 15px; background: var(--accent_blue); color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: 500; transition: background 0.3s;"
                        onmouseover="this.style.backgroundColor='#2980b9'"
                        onmouseout="this.style.backgroundColor='var(--accent_blue)'">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="vertical-align: middle; margin-right: 8px;">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Новый курс
                </button>
            </div>
            <!-- Список курсов -->
            <div class="courses-list" style="flex: 1; overflow-y: auto; padding: 10px;">
                <div class="course-item" style="padding: 12px 15px; border-radius: 4px; margin-bottom: 8px; background: rgba(52, 152, 219, 0.1); border-left: 3px solid var(--accent_blue); cursor: pointer;"
                     onmouseover="this.style.backgroundColor='rgba(52, 152, 219, 0.15)'"
                     onmouseout="this.style.backgroundColor='rgba(52, 152, 219, 0.1)'">
                    <div style="font-weight: 500; color: var(--accent_blue);">Экономика предприятия</div>
                    <div style="font-size: 12px; color: var(--gray); margin-top: 2px;">Изменен: 12.12.2023</div>
                </div>
                
                <div class="course-item" style="padding: 12px 15px; border-radius: 4px; margin-bottom: 8px; background: white; border: 1px solid rgba(0,0,0,0.1); cursor: pointer;"
                     onmouseover="this.style.backgroundColor='#f5f5f5'"
                     onmouseout="this.style.backgroundColor='white'">
                    <div style="font-weight: 500; color: var(--primary);">Маркетинг для начинающих</div>
                    <div style="font-size: 12px; color: var(--gray); margin-top: 2px;">Изменен: 10.12.2023</div>
                </div>
                
                <!-- Пустой шаблон для новых курсов -->
                <div class="course-item-template" style="display: none; padding: 12px 15px; border-radius: 4px; margin-bottom: 8px; background: white; border: 1px solid rgba(0,0,0,0.1); cursor: pointer;"
                     onmouseover="this.style.backgroundColor='#f5f5f5'"
                     onmouseout="this.style.backgroundColor='white'">
                    <div style="font-weight: 500; color: var(--primary);"></div>
                    <div style="font-size: 12px; color: var(--gray); margin-top: 2px;">Только что создан</div>
                </div>
            </div>
            <!-- Статистика -->
            <div style="padding: 15px; border-top: 1px solid rgba(0,0,0,0.1); background: #f9f9f9;">
                <div style="font-size: 14px; color: var(--gray);">Всего курсов: <span style="color: var(--primary); font-weight: 500;">2</span></div>
            </div>
        </div>
        <!-- Правая панель - редактор курса -->
        <div class="constructor-main" style="background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); overflow: hidden; display: flex; flex-direction: column;">
            
            <!-- Заголовок редактора -->
            <div style="padding: 20px; border-bottom: 1px solid rgba(0,0,0,0.1);">
                <h2 style="margin: 0 0 5px 0; color: var(--primary); display: flex; align-items: center; justify-content: space-between;">
                    <span>Редактирование курса: <span id="course-title">Экономика предприятия</span></span>
                    <button class="btn-save" style="padding: 8px 20px; background: #27ae60; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: 500; transition: background 0.3s;"
                            onmouseover="this.style.backgroundColor='#219955'"
                            onmouseout="this.style.backgroundColor='#27ae60'">
                        Сохранить курс
                    </button>
                </h2>
                <div style="font-size: 14px; color: var(--gray);">ID в Битрикс: 145</div>
            </div>
            <!-- Форма редактирования -->
            <div class="editor-content" style="flex: 1; overflow-y: auto; padding: 20px;">
                
                <!-- Блок 1: Основная информация -->
                <div class="section-card" style="margin-bottom: 30px; border: 1px solid rgba(0,0,0,0.1); border-radius: 6px; overflow: hidden;">
                    <div class="section-header" style="background: #f9f9f9; padding: 15px 20px; border-bottom: 1px solid rgba(0,0,0,0.1); display: flex; justify-content: space-between; align-items: center;">
                        <h3 style="margin: 0; color: var(--primary); display: flex; align-items: center;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="margin-right: 10px;">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12" y2="8"></line>
                            </svg>
                            Основная информация
                        </h3>
                        <span class="section-toggle" style="cursor: pointer; color: var(--accent_blue);">▼</span>
                    </div>
                    <div class="section-body" style="padding: 20px;">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                            <div>
                                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: var(--dark);">Название курса *</label>
                                <input type="text" class="form-input" style="width: 100%; padding: 10px 15px; border: 1px solid rgba(0,0,0,0.2); border-radius: 4px; font-size: 14px;"
                                       value="Экономика предприятия: от теории к практике">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: var(--dark);">Категория</label>
                                <select class="form-select" style="width: 100%; padding: 10px 15px; border: 1px solid rgba(0,0,0,0.2); border-radius: 4px; font-size: 14px; background: white;">
                                    <option>Экономика и финансы</option>
                                    <option>Маркетинг</option>
                                    <option>Программирование</option>
                                    <option>Дизайн</option>
                                </select>
                            </div>
                        </div>
                        
                        <div style="margin-top: 20px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 500; color: var(--dark);">Описание курса</label>
                            <textarea class="form-textarea" style="width: 100%; padding: 10px 15px; border: 1px solid rgba(0,0,0,0.2); border-radius: 4px; font-size: 14px; min-height: 100px; resize: vertical;">Этот курс научит вас принимать финансовые решения на основе реальных кейсов российских компаний. Вы освоите ключевые понятия экономики предприятия и научитесь применять их на практике.</textarea>
                        </div>
                        
                        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-top: 20px;">
                            <div>
                                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: var(--dark);">Длительность (часов)</label>
                                <input type="number" class="form-input" style="width: 100%; padding: 10px 15px; border: 1px solid rgba(0,0,0,0.2); border-radius: 4px; font-size: 14px;"
                                       value="20" min="1" max="500">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: var(--dark);">Сложность</label>
                                <select class="form-select" style="width: 100%; padding: 10px 15px; border: 1px solid rgba(0,0,0,0.2); border-radius: 4px; font-size: 14px; background: white;">
                                    <option>Начальный</option>
                                    <option selected>Средний</option>
                                    <option>Продвинутый</option>
                                </select>
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: var(--dark);">Статус</label>
                                <select class="form-select" style="width: 100%; padding: 10px 15px; border: 1px solid rgba(0,0,0,0.2); border-radius: 4px; font-size: 14px; background: white;">
                                    <option selected>В разработке</option>
                                    <option>Активный</option>
                                    <option>Скрытый</option>
                                    <option>Архивный</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Блок 2: Структура курса (Drag & Drop) -->
                <div class="section-card" style="margin-bottom: 30px; border: 1px solid rgba(0,0,0,0.1); border-radius: 6px; overflow: hidden;">
                    <div class="section-header" style="background: #f9f9f9; padding: 15px 20px; border-bottom: 1px solid rgba(0,0,0,0.1); display: flex; justify-content: space-between; align-items: center;">
                        <h3 style="margin: 0; color: var(--primary); display: flex; align-items: center;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="margin-right: 10px;">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="9" y1="3" x2="9" y2="21"></line>
                            </svg>
                            Структура курса
                            <span style="margin-left: 10px; font-size: 14px; font-weight: normal; color: var(--gray);" id="modules-count">3 модуля</span>
                        </h3>
                        <button class="btn-add-module" style="padding: 6px 15px; background: var(--accent_blue); color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; transition: background 0.3s;"
                                onmouseover="this.style.backgroundColor='#2980b9'"
                                onmouseout="this.style.backgroundColor='var(--accent_blue)'">
                            + Добавить модуль
                        </button>
                    </div>
                    
                    <div class="section-body" style="padding: 20px;">
                        <!-- Drag & Drop контейнер -->
                        <div class="modules-container" id="modules-container" style="min-height: 300px; padding: 10px; background: #f9f9f9; border-radius: 4px; border: 2px dashed #ddd;">
                            
                            <!-- Модуль 1 -->
                            <div class="module-item draggable" draggable="true" style="background: white; border: 1px solid rgba(0,0,0,0.1); border-radius: 4px; margin-bottom: 15px; overflow: hidden; cursor: move;">
                                <div class="module-header" style="padding: 15px; background: #f0f7ff; border-bottom: 1px solid rgba(0,0,0,0.1); display: flex; justify-content: space-between; align-items: center;">
                                    <div style="display: flex; align-items: center;">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="margin-right: 10px; cursor: ns-resize;" class="drag-handle">
                                            <circle cx="9" cy="5" r="1"></circle>
                                            <circle cx="9" cy="12" r="1"></circle>
                                            <circle cx="9" cy="19" r="1"></circle>
                                            <circle cx="15" cy="5" r="1"></circle>
                                            <circle cx="15" cy="12" r="1"></circle>
                                            <circle cx="15" cy="19" r="1"></circle>
                                        </svg>
                                        <h4 style="margin: 0; color: var(--primary);">Модуль 1: Основы экономики</h4>
                                    </div>
                                    <div>
                                        <button class="btn-module-edit" style="background: none; border: none; color: var(--accent_blue); cursor: pointer; margin-right: 10px;">✎</button>
                                        <button class="btn-module-delete" style="background: none; border: none; color: #e74c3c; cursor: pointer;">🗑</button>
                                    </div>
                                </div>
                                <div class="module-body" style="padding: 15px;">
                                    <div style="font-size: 14px; color: var(--gray); margin-bottom: 10px;">4 урока (2 теории, 2 практики)</div>
                                    
                                    <!-- Элементы модуля -->
                                    <div class="module-items">
                                        <div class="lesson-item" style="padding: 10px 15px; background: white; border: 1px solid #e0e0e0; border-radius: 4px; margin-bottom: 8px; display: flex; align-items: center;">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3498db" style="margin-right: 10px;">
                                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                            </svg>
                                            <span style="flex: 1;">Введение в экономику предприятия</span>
                                            <span style="font-size: 12px; color: var(--gray); margin-right: 10px;">Теория</span>
                                            <button style="background: none; border: none; color: var(--gray); cursor: pointer; font-size: 12px;">✎</button>
                                        </div>
                                        
                                        <div class="lesson-item" style="padding: 10px 15px; background: white; border: 1px solid #e0e0e0; border-radius: 4px; margin-bottom: 8px; display: flex; align-items: center;">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e74c3c" style="margin-right: 10px;">
                                                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                                <polyline points="2 17 12 22 22 17"></polyline>
                                                <polyline points="2 12 12 17 22 12"></polyline>
                                            </svg>
                                            <span style="flex: 1;">Практика: Расчет себестоимости</span>
                                            <span style="font-size: 12px; color: var(--gray); margin-right: 10px;">Практика</span>
                                            <button style="background: none; border: none; color: var(--gray); cursor: pointer; font-size: 12px;">✎</button>
                                        </div>
                                    </div>
                                    
                                    <button class="btn-add-lesson" style="width: 100%; padding: 8px; margin-top: 10px; background: #f5f5f5; border: 1px dashed #ccc; border-radius: 4px; color: var(--gray); cursor: pointer; font-size: 14px;"
                                            onmouseover="this.style.backgroundColor='#e9e9e9'"
                                            onmouseout="this.style.backgroundColor='#f5f5f5'">
                                        + Добавить урок
                                    </button>
                                </div>
                            </div>

                            <!-- Модуль 2 -->
                            <div class="module-item draggable" draggable="true" style="background: white; border: 1px solid rgba(0,0,0,0.1); border-radius: 4px; margin-bottom: 15px; overflow: hidden; cursor: move;">
                                <div class="module-header" style="padding: 15px; background: #f0f7ff; border-bottom: 1px solid rgba(0,0,0,0.1); display: flex; justify-content: space-between; align-items: center;">
                                    <div style="display: flex; align-items: center;">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="margin-right: 10px; cursor: ns-resize;" class="drag-handle">
                                            <circle cx="9" cy="5" r="1"></circle>
                                            <circle cx="9" cy="12" r="1"></circle>
                                            <circle cx="9" cy="19" r="1"></circle>
                                            <circle cx="15" cy="5" r="1"></circle>
                                            <circle cx="15" cy="12" r="1"></circle>
                                            <circle cx="15" cy="19" r="1"></circle>
                                        </svg>
                                        <h4 style="margin: 0; color: var(--primary);">Модуль 2: Финансовый анализ</h4>
                                    </div>
                                    <div>
                                        <button class="btn-module-edit" style="background: none; border: none; color: var(--accent_blue); cursor: pointer; margin-right: 10px;">✎</button>
                                        <button class="btn-module-delete" style="background: none; border: none; color: #e74c3c; cursor: pointer;">🗑</button>
                                    </div>
                                </div>
                                <div class="module-body" style="padding: 15px;">
                                    <div style="font-size: 14px; color: var(--gray); margin-bottom: 10px;">3 урока (2 теории, 1 практика)</div>
                                    <button class="btn-add-lesson" style="width: 100%; padding: 8px; margin-top: 10px; background: #f5f5f5; border: 1px dashed #ccc; border-radius: 4px; color: var(--gray); cursor: pointer; font-size: 14px;"
                                            onmouseover="this.style.backgroundColor='#e9e9e9'"
                                            onmouseout="this.style.backgroundColor='#f5f5f5'">
                                        + Добавить урок
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Шаблон пустого модуля -->
                            <div class="module-item-template" style="display: none; background: white; border: 1px solid rgba(0,0,0,0.1); border-radius: 4px; margin-bottom: 15px; overflow: hidden; cursor: move;">
                                <div class="module-header" style="padding: 15px; background: #f0f7ff; border-bottom: 1px solid rgba(0,0,0,0.1); display: flex; justify-content: space-between; align-items: center;">
                                    <div style="display: flex; align-items: center;">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="margin-right: 10px; cursor: ns-resize;" class="drag-handle">
                                            <circle cx="9" cy="5" r="1"></circle>
                                            <circle cx="9" cy="12" r="1"></circle>
                                            <circle cx="9" cy="19" r="1"></circle>
                                            <circle cx="15" cy="5" r="1"></circle>
                                            <circle cx="15" cy="12" r="1"></circle>
                                            <circle cx="15" cy="19" r="1"></circle>
                                        </svg>
                                        <h4 style="margin: 0; color: var(--primary);">Новый модуль</h4>
                                    </div>
                                    <div>
                                        <button class="btn-module-edit" style="background: none; border: none; color: var(--accent_blue); cursor: pointer; margin-right: 10px;">✎</button>
                                        <button class="btn-module-delete" style="background: none; border: none; color: #e74c3c; cursor: pointer;">🗑</button>
                                    </div>
                                </div>
                                <div class="module-body" style="padding: 15px;">
                                    <div style="font-size: 14px; color: var(--gray); margin-bottom: 10px;">0 уроков</div>
                                    <button class="btn-add-lesson" style="width: 100%; padding: 8px; margin-top: 10px; background: #f5f5f5; border: 1px dashed #ccc; border-radius: 4px; color: var(--gray); cursor: pointer; font-size: 14px;">
                                        + Добавить урок
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: 20px; font-size: 14px; color: var(--gray);">
                            💡 Перетаскивайте модули для изменения порядка. В каждом модуле можно добавлять теоретические и практические уроки.
                        </div>
                        <!-- Блок 3: Настройки публикации -->
                        <div class="section-card" style="margin-bottom: 30px; border: 1px solid rgba(0,0,0,0.1); border-radius: 6px; overflow: hidden;">
                            <div class="section-header" style="background: #f9f9f9; padding: 15px 20px; border-bottom: 1px solid rgba(0,0,0,0.1); display: flex; justify-content: space-between; align-items: center;">
                                <h3 style="margin: 0; color: var(--primary); display: flex; align-items: center;">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="margin-right: 10px;">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                    Настройки публикации
                                </h3>
                            </div>
                            <div class="section-body" style="padding: 20px;">
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                                    <div>
                                        <label style="display: flex; align-items: center; margin-bottom: 15px;">
                                            <input type="checkbox" style="margin-right: 10px;" checked>
                                            <span style="font-weight: 500; color: var(--dark);">Опубликовать в каталоге Битрикс</span>
                                        </label>
                                        <div style="font-size: 13px; color: var(--gray); margin-left: 24px; margin-bottom: 20px;">
                                            Курс будет добавлен в инфоблок "Курсы" (ID: 5)
                                        </div>
                                    </div>
                                    <div>
                                        <label style="display: flex; align-items: center; margin-bottom: 15px;">
                                            <input type="checkbox" style="margin-right: 10px;" checked>
                                            <span style="font-weight: 500; color: var(--dark);">Связать с теорией (ID: 6)</span>
                                        </label>
                                        <label style="display: flex; align-items: center;">
                                            <input type="checkbox" style="margin-right: 10px;" checked>
                                            <span style="font-weight: 500; color: var(--dark);">Связать с практикой (ID: 5)</span>
                                        </label>
                                    </div>
                                </div>
                                
                                <div style="margin-top: 20px; padding: 15px; background: #f0f7ff; border-radius: 4px; border-left: 4px solid var(--accent_blue);">
                                    <div style="font-weight: 500; color: var(--primary); margin-bottom: 5px;">Информация о связи с Битрикс:</div>
                                    <div style="font-size: 13px; color: var(--gray);">
                                        • Курс будет связан с товаром в каталоге через свойство "COURSE_ID"<br>
                                        • Теоретические материалы создаются в инфоблоке "Теория" (ID: 6)<br>
                                        • Практические задания создаются в инфоблоке "Практика" (ID: 5)<br>
                                        • Связь осуществляется через свойство "LINKED_COURSE"
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>         
</div>

<style>
#workarea{
    width: 100% !important;
}
#sidebar{
    display: none !important;
}
/* Общие стили для конструктора */
.constructor-container {
    --primary: #2c3e50;
    --accent_blue: #3498db;
    --dark: #34495e;
    --gray: #7f8c8d;
    --success: #27ae60;
    --warning: #f39c12;
    --danger: #e74c3c;
}

/* Drag & Drop стили */
.draggable {
    transition: transform 0.2s, box-shadow 0.2s;
}

.draggable.dragging {
    opacity: 0.5;
    transform: scale(1.02);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.drag-handle {
    cursor: grab;
}

.drag-handle:active {
    cursor: grabbing;
}

.drop-zone {
    min-height: 100px;
    transition: all 0.3s;
}

.drop-zone.drag-over {
    background-color: rgba(52, 152, 219, 0.1);
    border-color: var(--accent_blue);
}

/* Анимации */
.course-item, .module-item, .lesson-item {
    transition: all 0.3s ease;
}

.form-input, .form-select, .form-textarea {
    transition: border-color 0.3s;
}

.form-input:focus, .form-select:focus, .form-textarea:focus {
    outline: none;
    border-color: var(--accent_blue);
}

/* Модальные окна (будут использоваться позже) */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.5);
    z-index: 1000;
    align-items: center;
    justify-content: center;
}

.modal-content {
    background: white;
    border-radius: 8px;
    max-width: 500px;
    width: 90%;
    max-height: 90vh;
    overflow-y: auto;
}

/* Адаптивность */
@media (max-width: 992px) {
    .constructor-grid {
        grid-template-columns: 1fr !important;
    }
    
    .constructor-sidebar {
        margin-bottom: 20px;
    }
    
    .section-body > div[style*="grid-template-columns"] {
        grid-template-columns: 1fr !important;
    }
}

@media (max-width: 768px) {
    .constructor-header h1 {
        font-size: 24px;
    }
    
    .module-header {
        flex-direction: column;
        align-items: flex-start !important;
    }
    
    .module-header div {
        width: 100%;
        margin-bottom: 10px;
    }
}
</style>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>