# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.contrib import admin

from .models import Task

# This adds the task model to the web interface for modification. Register your models here.
admin.site.register(Task)
