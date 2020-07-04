#!/usr/bin/env python
# coding: utf-8

# In[17]:


import pandas
from sklearn import tree
import pydotplus
from sklearn.tree import DecisionTreeClassifier
import matplotlib.pyplot as plt
import matplotlib.image as pltimg


# In[18]:


df = pandas.read_csv("C:/Users/{{{/Desktop/py/dataset.csv")


# In[19]:


print(df)


# In[20]:


d = {'yes': 1, 'no': 0}
df['buy'] = df['buy'].map(d)

print(df)


# In[21]:


features = ['company_id', 'claim_ratio', 'coverage', 'premium']

X = df[features]
y = df['buy']

print(X)
print(y)


# In[24]:


dtree = DecisionTreeClassifier()
dtree = dtree.fit(X, y)
data = tree.export_graphviz(dtree, out_file=None, feature_names=features)
graph = pydotplus.graph_from_dot_data(data)



# In[43]:


print('enter values in order to company id,claim ratio, coverage and premium to check whether the insurance you want is good')
x,y,z,k = input("Enter a values: ").split() 
print("Company_ID: ", x) 
print("claim ratio : ", y) 
print("coverage upto : ", z)
print("premium :", k)
print()


# In[44]:



print(x)


# In[45]:


print(dtree.predict([[float(x), float(y), float(z), float(k)]]))
print('(1) is yes, (0) is no')


# In[ ]:




