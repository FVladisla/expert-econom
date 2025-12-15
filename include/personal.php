
<div class="personal-account" style="max-width: 1200px; margin: 0 auto; font-family: Arial, sans-serif;">
    <!-- Обновленная шапка личного кабинета -->
    <div class="account-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; padding-bottom: 15px; border-bottom: 1px solid rgba(0,0,0,0.1);">
        <h1 style="color: var(--primary); margin: 0;">Личный кабинет</h1>
        <div class="user-info" style="display: flex; align-items: center; gap: 20px;">
            
            <!-- Иконка уведомлений -->
            <div class="notifications-wrapper" style="position: relative;">
                <button class="notifications-btn" 
                        style="background: none; border: none; cursor: pointer; padding: 8px; position: relative;"
                        onclick="toggleNotifications()">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                    
                    <!-- Бейдж с количеством непрочитанных -->
                    <span class="notification-badge" 
                        style="position: absolute; top: 0; right: 0; background: #e74c3c; color: white; font-size: 11px; font-weight: bold; min-width: 18px; height: 18px; border-radius: 9px; display: flex; align-items: center; justify-content: center; padding: 0 4px;">
                        <?php 
                        // Здесь будет PHP код для получения количества непрочитанных
                        // $unreadCount = getUnreadNotificationsCount($USER->GetID());
                        // echo $unreadCount > 99 ? '99+' : $unreadCount;
                        echo '3'; // Пример
                        ?>
                    </span>
                </button>
                
                <!-- Выпадающее окно уведомлений -->
                <div class="notifications-dropdown" 
                    style="display: none; position: absolute; top: 100%; right: 0; width: 350px; background: white; border-radius: 8px; box-shadow: 0 5px 25px rgba(0,0,0,0.15); z-index: 1000; margin-top: 10px;">
                    
                    <div style="padding: 20px; border-bottom: 1px solid rgba(0,0,0,0.1);">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="margin: 0; font-size: 16px; font-weight: 600; color: var(--primary);">Уведомления</h3>
                            <button onclick="markAllAsRead()" 
                                    style="background: none; border: none; color: var(--accent_blue); cursor: pointer; font-size: 13px; padding: 4px 8px;">
                                Прочитать все
                            </button>
                        </div>
                    </div>
                    
                    <div class="notifications-list" style="max-height: 400px; overflow-y: auto;">
                        <!-- Здесь будут уведомления -->
                        <?php
                        // Здесь будет PHP код для вывода уведомлений
                        $notifications = [
                            [
                                'id' => 1,
                                'type' => 'success',
                                'title' => 'Курс доступен',
                                'message' => 'Курс "Экономика предприятия" теперь доступен для прохождения',
                                'time' => '2 часа назад',
                                'is_read' => 0
                            ],
                            [
                                'id' => 2,
                                'type' => 'info',
                                'title' => 'Новое задание',
                                'message' => 'Добавлено новое практическое задание в модуль 2',
                                'time' => 'Вчера',
                                'is_read' => 0
                            ],
                            [
                                'id' => 3,
                                'type' => 'warning',
                                'title' => 'Срок сдачи',
                                'message' => 'До сдачи задания "Финансовый анализ" осталось 3 дня',
                                'time' => '2 дня назад',
                                'is_read' => 1
                            ]
                        ];
                        
                        foreach ($notifications as $notification): ?>
                        <div class="notification-item <?= $notification['is_read'] ? 'read' : 'unread' ?>" 
                            style="padding: 15px 20px; border-bottom: 1px solid rgba(0,0,0,0.05); cursor: pointer; transition: background 0.2s;"
                            onmouseover="this.style.backgroundColor='#f9f9f9'"
                            onmouseout="this.style.backgroundColor='white'"
                            onclick="markAsRead(<?= $notification['id'] ?>)">
                            
                            <div style="display: flex; align-items: flex-start; gap: 12px;">
                                <!-- Иконка типа уведомления -->
                                <div class="notification-icon" 
                                    style="flex-shrink: 0; width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center;"
                                    style="<?= 
                                    $notification['type'] == 'success' ? 'background: #d4edda; color: #155724;' : 
                                    ($notification['type'] == 'warning' ? 'background: #fff3cd; color: #856404;' : 
                                    ($notification['type'] == 'error' ? 'background: #f8d7da; color: #721c24;' : 
                                    'background: #d1ecf1; color: #0c5460;')) ?>">
                                    
                                    <?php if($notification['type'] == 'success'): ?>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <?php elseif($notification['type'] == 'warning'): ?>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                                        <line x1="12" y1="9" x2="12" y2="13"></line>
                                        <line x1="12" y1="17" x2="12" y2="17"></line>
                                    </svg>
                                    <?php else: ?>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="8" x2="12" y2="12"></line>
                                        <line x1="12" y1="16" x2="12" y2="16"></line>
                                    </svg>
                                    <?php endif; ?>
                                </div>
                                
                                <!-- Содержимое уведомления -->
                                <div style="flex: 1;">
                                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 4px;">
                                        <h4 style="margin: 0; font-size: 14px; font-weight: 600; color: var(--primary);">
                                            <?= $notification['title'] ?>
                                            <?php if(!$notification['is_read']): ?>
                                            <span style="display: inline-block; width: 8px; height: 8px; background: #3498db; border-radius: 50%; margin-left: 6px;"></span>
                                            <?php endif; ?>
                                        </h4>
                                        <span style="font-size: 12px; color: var(--gray);"><?= $notification['time'] ?></span>
                                    </div>
                                    <p style="margin: 0; font-size: 13px; color: var(--gray); line-height: 1.4;">
                                        <?= $notification['message'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div style="padding: 15px 20px; text-align: center; border-top: 1px solid rgba(0,0,0,0.1);">
                        <a href="/personal/notifications/" 
                        style="color: var(--accent_blue); text-decoration: none; font-size: 14px; font-weight: 500;">
                            Все уведомления
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Аватар и логин пользователя -->
            <div style="display: flex; align-items: center;">
                <div style="width: 40px; height: 40px; background: var(--accent_blue); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 10px;">
                    <!-- <?=substr($USER->GetFirstName(), 0, 1)?> -->
                </div>
                <span><?=$USER->GetLogin()?></span>
            </div>
        </div>
    </div>

    <!-- Основной контент -->
    <div class="account-content" style="display: grid; grid-template-columns: 250px 1fr; gap: 30px;">
        <!-- Меню -->
        <div class="account-menu" style="background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); ">
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 10px;">
                    <a href="#profile" style="display: block; padding: 10px 15px; color: var(--dark); text-decoration: none; border-radius: 4px; transition: all 0.3s;"
                       onmouseover="this.style.backgroundColor='#f5f5f5'" 
                       onmouseout="this.style.backgroundColor='transparent'">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="vertical-align: middle; margin-right: 8px;">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        Профиль
                    </a>
                </li>
                <li style="margin-bottom: 10px;">
                    <a href="#courses" style="display: block; padding: 10px 15px; background: rgba(52, 152, 219, 0.1); color: var(--accent_blue); text-decoration: none; border-radius: 4px;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="vertical-align: middle; margin-right: 8px;">
                            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                        </svg>
                        Мои курсы
                    </a>
                </li>
                <li style="margin-bottom: 10px;">
                    <a href="/personal/analytics/" style="display: block; padding: 10px 15px; color: var(--dark); text-decoration: none; border-radius: 4px; transition: all 0.3s;"
                       onmouseover="this.style.backgroundColor='#f5f5f5'" 
                       onmouseout="this.style.backgroundColor='transparent'">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="vertical-align: middle; margin-right: 8px;">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                        </svg>
                        Аналитика
                    </a>
                </li>
                <li>
                    <a href="/personal/settings/" style="display: block; padding: 10px 15px; color: var(--dark); text-decoration: none; border-radius: 4px; transition: all 0.3s;"
                       onmouseover="this.style.backgroundColor='#f5f5f5'" 
                       onmouseout="this.style.backgroundColor='transparent'">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="vertical-align: middle; margin-right: 8px;">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                        </svg>
                        Настройки
                    </a>
                </li>
                <li>
                    <a href="/course_creator/" style="display: block; padding: 10px 15px; color: var(--dark); text-decoration: none; border-radius: 4px; transition: all 0.3s;"
                       onmouseover="this.style.backgroundColor='#f5f5f5'" 
                       onmouseout="this.style.backgroundColor='transparent'">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 8px;">
                            <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                            <path d="M2 17l10 5 10-5"></path>
                            <path d="M2 12l10 5 10-5"></path>
                            <circle cx="12" cy="12" r="2"></circle>
                            <circle cx="7" cy="7" r="2"></circle>
                            <circle cx="17" cy="7" r="2"></circle>
                        </svg>
                        Конструктор курсов
                    </a>
                </li>
            </ul>
        </div>

        <!-- Контент -->
        <div class="account-main" style="background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); padding: 20px 0px 0px 20px;">
            <h2 style="color: var(--primary); margin-top: 0; padding-bottom: 10px; border-bottom: 1px solid rgba(0,0,0,0.1);">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="vertical-align: middle; margin-right: 10px;">
                    <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                </svg>
                Мои курсы
            </h2>

            <!-- Карточки курсов -->
            <div class="courses-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; margin-top: 20px;">
                <?php for($i = 1; $i <= 1; $i++): ?>
                <div class="course-card" style="border: 1px solid rgba(0,0,0,0.1); border-radius: 6px; overflow: hidden; transition: all 0.3s;"
                     onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 5px 15px rgba(0,0,0,0.1)'"
                     onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                    <div style="height: 120px; background: var(--accent_blue); position: relative;">
                        <div style="position: absolute; bottom: 10px; left: 10px; background: white; color: var(--accent_blue); padding: 3px 8px; border-radius: 12px; font-size: 12px; font-weight: bold;">
                            В процессе
                        </div>
                    </div>
                    <div style="padding: 15px;">
                        <h3 style="margin: 0 0 10px 0; color: var(--primary);">Экономика предприятия: от теории к практике</h3>
                        <p style="color: var(--gray); margin: 0 0 15px 0; font-size: 14px;">Этот курс научит вас принимать финансовые решения на основе реальных кейсов российских...</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div style="font-size: 12px; color: var(--gray);">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="vertical-align: middle; margin-right: 5px;">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                15 часов / 20 часов
                            </div>
                            <a href="#" style="font-size: 14px; color: var(--accent_blue); text-decoration: none; font-weight: 500;">
                                Продолжить →
                            </a>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>

            <!-- Прогресс -->
            <h3 style="color: var(--primary); margin: 30px 0 15px 0;">Ваш прогресс</h3>
            <div style="background: #f5f5f5; border-radius: 4px; height: 8px; margin-bottom: 30px;">
                <div style="width: 65%; height: 100%; background: var(--accent_blue); border-radius: 4px;"></div>
            </div>
        </div>
    </div>
</div>
<style>
/* Общие стили */
.personal-account {
    --primary: #2c3e50;
    
    --dark: #34495e;
    --gray: #7f8c8d;
}

/* Анимации */
.course-card {
    transition: all 0.3s ease;
}

/* Адаптивность */
@media (max-width: 768px) {
    .account-content {
        grid-template-columns: 1fr !important;
    }
    
    .account-menu {
        margin-bottom: 20px;
    }
}

/* Стили для системы уведомлений */
.notifications-wrapper {
    position: relative;
}

.notifications-btn {
    background: none;
    border: none;
    cursor: pointer;
    padding: 8px;
    position: relative;
    border-radius: 50%;
    transition: background-color 0.2s;
}

.notifications-btn:hover {
    background-color: rgba(0,0,0,0.05);
}

.notification-badge {
    position: absolute;
    top: 0;
    right: 0;
    background: #e74c3c;
    color: white;
    font-size: 11px;
    font-weight: bold;
    min-width: 18px;
    height: 18px;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 4px;
    border: 2px solid white;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

.notifications-dropdown {
    animation: slideDown 0.3s ease;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.notifications-list::-webkit-scrollbar {
    width: 6px;
}

.notifications-list::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

.notifications-list::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 3px;
}

.notifications-list::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

.notification-item.unread {
    background-color: #f8f9fa;
}

.notification-item:hover {
    background-color: #f0f7ff !important;
}

.notification-icon {
    transition: transform 0.2s;
}

.notification-item:hover .notification-icon {
    transform: scale(1.1);
}
</style>

<script>
// Функция для переключения отображения уведомлений
function toggleNotifications() {
    const dropdown = document.querySelector('.notifications-dropdown');
    const isVisible = dropdown.style.display === 'block';
    
    if (isVisible) {
        dropdown.style.display = 'none';
    } else {
        dropdown.style.display = 'block';
        
        // Закрытие при клике вне области
        setTimeout(() => {
            const closeOnClickOutside = (e) => {
                if (!dropdown.contains(e.target) && !e.target.closest('.notifications-btn')) {
                    dropdown.style.display = 'none';
                    document.removeEventListener('click', closeOnClickOutside);
                }
            };
            document.addEventListener('click', closeOnClickOutside);
        }, 0);
    }
}

// Функция для пометки уведомления как прочитанного
function markAsRead(notificationId) {
    // AJAX запрос для пометки как прочитанного
    fetch('/ajax/notifications/mark_as_read.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ id: notificationId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Обновляем бейдж
            const badge = document.querySelector('.notification-badge');
            const currentCount = parseInt(badge.textContent);
            if (currentCount > 0) {
                badge.textContent = currentCount - 1;
                if (currentCount - 1 === 0) {
                    badge.style.display = 'none';
                }
            }
            
            // Помечаем уведомление как прочитанное
            const notification = document.querySelector(`.notification-item[onclick*="${notificationId}"]`);
            notification.classList.remove('unread');
            notification.classList.add('read');
            
            // Убираем синюю точку
            const dot = notification.querySelector('span[style*="background: #3498db"]');
            if (dot) dot.remove();
        }
    });
}

// Функция для пометки всех уведомлений как прочитанных
function markAllAsRead() {
    fetch('/ajax/notifications/mark_all_as_read.php', {
        method: 'POST'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Скрываем бейдж
            document.querySelector('.notification-badge').style.display = 'none';
            
            // Помечаем все уведомления как прочитанные
            document.querySelectorAll('.notification-item').forEach(item => {
                item.classList.remove('unread');
                item.classList.add('read');
                const dot = item.querySelector('span[style*="background: #3498db"]');
                if (dot) dot.remove();
            });
        }
    });
}

// Обновление количества уведомлений каждые 30 секунд
setInterval(() => {
    fetch('/ajax/notifications/get_count.php')
    .then(response => response.json())
    .then(data => {
        if (data.count !== undefined) {
            const badge = document.querySelector('.notification-badge');
            if (data.count > 0) {
                badge.style.display = 'flex';
                badge.textContent = data.count > 99 ? '99+' : data.count;
            } else {
                badge.style.display = 'none';
            }
        }
    });
}, 30000);
</script>