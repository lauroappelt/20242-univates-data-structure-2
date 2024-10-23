from graphviz import Digraph

class GrafoMatrizAdj:
    def __init__(self, vertices):
        self.vertices = vertices
        self.matriz = [[0 for _ in range(vertices)] for _ in range(vertices)]
        self.nome_para_indice = {}
        self.indice_para_nome = {}
        self.contador = 0

    def adicionar_vertice(self, vertice):
        if vertice not in self.nome_para_indice:
            self.nome_para_indice[vertice] = self.contador
            self.indice_para_nome[self.contador] = vertice
            self.contador += 1

    def adicionar_aresta(self, origem, destino, peso):
        self.adicionar_vertice(origem)
        self.adicionar_vertice(destino)
        indice_origem = self.nome_para_indice[origem]
        indice_destino = self.nome_para_indice[destino]
        self.matriz[indice_origem][indice_destino] = peso
        self.matriz[indice_destino][indice_origem] = peso  # Se for não-direcionado

    def mostrar_matriz(self):
        for i in range(self.vertices):
            print(f"{self.indice_para_nome[i]} -> {self.matriz[i]}")

    def visualizar(self):
        graph = Digraph()
        for i in range(self.vertices):
            for j in range(self.vertices):
                if self.matriz[i][j] != 0:
                    origem = self.indice_para_nome[i]
                    destino = self.indice_para_nome[j]
                    peso = self.matriz[i][j]
                    graph.edge(origem, destino, label=str(peso))
        graph.view()

# Exemplo de uso - Matriz de Adjacência e Visualização
grafo_matriz = GrafoMatrizAdj(11)  # 11 cidades
grafo_matriz.adicionar_aresta("Encantado", "Lajeado", 2)
grafo_matriz.adicionar_aresta("Encantado", "Arroio do Meio", 10)
grafo_matriz.adicionar_aresta("Encantado", "Arvorezinha", 30)
grafo_matriz.adicionar_aresta("Encantado", "Carlos Barbosa", 45)
grafo_matriz.adicionar_aresta("Arroio do Meio", "Lajeado", 2)
grafo_matriz.adicionar_aresta("Arroio do Meio", "Encantado", 10)
grafo_matriz.adicionar_aresta("Lajeado", "Estrela", 2)
grafo_matriz.adicionar_aresta("Lajeado", "Arroio do Meio", 2)
grafo_matriz.adicionar_aresta("Lajeado", "Venâncio Aires", 30)
grafo_matriz.adicionar_aresta("Lajeado", "Soledade", 70)
grafo_matriz.adicionar_aresta("Estrela", "Bom Retiro do Sul", 12)
grafo_matriz.adicionar_aresta("Estrela", "Teutônia", 15)
grafo_matriz.adicionar_aresta("Bom Retiro do Sul", "Venâncio Aires", 12)
grafo_matriz.adicionar_aresta("Teutônia", "Taquari", 25)
grafo_matriz.adicionar_aresta("Teutônia", "Carlos Barbosa", 30)
grafo_matriz.adicionar_aresta("Taquari", "Teutônia", 25)
grafo_matriz.adicionar_aresta("Carlos Barbosa", "Encantado", 45)
grafo_matriz.adicionar_aresta("Arvorezinha", "Encantado", 30)

grafo_matriz.mostrar_matriz()
grafo_matriz.visualizar()