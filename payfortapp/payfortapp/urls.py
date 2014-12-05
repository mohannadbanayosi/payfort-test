from django.conf.urls import patterns, include, url
from django.contrib import admin

from payfort import views

urlpatterns = patterns('',
    # Examples:
    # url(r'^$', 'payfortapp.views.home', name='home'),
    # url(r'^blog/', include('blog.urls')),

    url(r'^admin/', include(admin.site.urls)),
    url(r'^$', views.home, name='home'),
    url(r'^buy/ipad/$', views.buy_ipad, name='buy_ipad'),
)
