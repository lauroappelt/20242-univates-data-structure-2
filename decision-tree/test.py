import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.tree import DecisionTreeClassifier
from sklearn import metrics
import matplotlib.pyplot as plt
from sklearn.tree import plot_tree

df = pd.read_csv('winequality-red.csv')

# Verificar as primeiras linhas do dataset
print(df.head())

# Separar as características (features) e o alvo (target)
X = df.drop('quality', axis=1)  # Todas as colunas menos 'quality'
y = df['quality']               # A coluna 'quality' será o rótulo (label)

# Dividir os dados em conjuntos de treino e teste
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3, random_state=42)

# Criar o modelo da árvore de decisão
clf = DecisionTreeClassifier(max_depth=5)

# Treinar o modelo com os dados de treinamento
clf = clf.fit(X_train, y_train)

# Fazer previsões nos dados de teste
y_pred = clf.predict(X_test)


# Exibir a árvore de decisão visualmente
plot_tree(clf, filled=True, feature_names=X.columns, class_names=[str(c) for c in sorted(df['quality'].unique())], rounded=True)
plt.savefig('out.pdf')