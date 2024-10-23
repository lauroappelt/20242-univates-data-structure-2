from graphviz import Graph

class GrafoListaAdj:
    def __init__(self):
        self.grafo = {}

    def adicionar_vertice(self, vertice):
        if vertice not in self.grafo:
            self.grafo[vertice] = []

    def adicionar_aresta(self, origem, destino, peso):
        # Adicionando a aresta de origem para destino
        self.adicionar_vertice(origem)
        self.adicionar_vertice(destino)
        self.grafo[origem].append((destino, peso))
        
        # Adicionando a aresta inversa de destino para origem (grafo não direcionado)
        self.grafo[destino].append((origem, peso))

    def mostrar_grafo(self):
        for vertice in self.grafo:
            print(f"{vertice} -> {self.grafo[vertice]}")

    def visualizar(self):
        graph = Graph()  # Usar Graph (não Digraph) para grafos não direcionados
        for origem in self.grafo:
            for destino, peso in self.grafo[origem]:
                if origem < destino:  # Evitar duplicação de arestas (bidirecional)
                    graph.edge(origem, destino, label=str(peso))
        graph.view()

# Exemplo de uso - Lista de Adjacência e Visualização
grafo_lista = GrafoListaAdj()
grafo_lista.adicionar_aresta("Encantado", "Lajeado", 2)
grafo_lista.adicionar_aresta("Encantado", "Arroio do Meio", 10)
grafo_lista.adicionar_aresta("Encantado", "Arvorezinha", 30)
grafo_lista.adicionar_aresta("Encantado", "Carlos Barbosa", 45)
grafo_lista.adicionar_aresta("Arroio do Meio", "Lajeado", 2)
grafo_lista.adicionar_aresta("Lajeado", "Estrela", 2)
grafo_lista.adicionar_aresta("Lajeado", "Venâncio Aires", 30)
grafo_lista.adicionar_aresta("Lajeado", "Soledade", 70)
grafo_lista.adicionar_aresta("Estrela", "Bom Retiro do Sul", 12)
grafo_lista.adicionar_aresta("Estrela", "Teutônia", 15)
grafo_lista.adicionar_aresta("Bom Retiro do Sul", "Venâncio Aires", 12)
grafo_lista.adicionar_aresta("Teutônia", "Taquari", 25)
grafo_lista.adicionar_aresta("Teutônia", "Carlos Barbosa", 30)
grafo_lista.adicionar_aresta("Carlos Barbosa", "Encantado", 45)
grafo_lista.adicionar_aresta("Arvorezinha", "Encantado", 30)

grafo_lista.mostrar_grafo()
grafo_lista.visualizar()