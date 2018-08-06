# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.shortcuts import render

#imports httpresponse method
from django.http import HttpResponse

from .models import Task

# Create your views here.


def	index(request):
	#gathering list of all task objects
	task_list = Task.objects.all()
	#the loops below create two seperate list based on value in the Task sql
	'''strpriority = []
	#a is a global variable to be reset for iterations in loops
	a=0
	for q in task_list:
		strpriority.insert(a,q.task_priority)
		a=a+1

	strname = []
	#global reset
	a=0
	for q in task_list:
		strname.insert(a,q.task_name)
		a=a+1

	#listing objects with comma seperations by looping through each item
	#strpriority =  ', '.join([q.task_priority for q in task_list])
	#strname = ', '.join([q.task_name for q in task_list])

	
	#global reset
	a=len(strname)

	while(a!=1):
		strpriority.insert(a-1,strname[a-1])
		a=a-1
		if a==1:
			strpriority.insert(0,strname[0])

	finallist=', '.join([q for q in strpriority])
'''
	
	
	#outputting the list in html
	return HttpResponse("Variable is commented out.")
