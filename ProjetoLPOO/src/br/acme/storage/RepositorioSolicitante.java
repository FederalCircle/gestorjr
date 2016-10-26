package br.acme.storage;
import br.acme.users.Solicitante;

public class RepositorioSolicitante {
	// Atributos ----------------------------------------------------------------------------------------------------
	private Solicitante[] listaSolicitante = new Solicitante[10];
	
	// Construtor Padrão
	
	// Getters and Setters ----------------------------------------------------------------------------------------------------
	public Solicitante[] getListaSolicitante() {
		return listaSolicitante;
	}

	public void setListaSolicitante(Solicitante[] listaSolicitante) {
		this.listaSolicitante = listaSolicitante;
	}
	
	// Métodos ----------------------------------------------------------------------------------------------------
	public void adicionar(Solicitante novoSolicitante){
		/* 
		 * Para cada elemento não nulo do Array:
		 * 	 > Compara o ID do atual com o ID do novo:
		 * 		> Se o ID for igual, quebra o laço;
		 * 		> Se for diferente, segue para o próximo elementoe e aumenta o índice;
		 * Caso encontre um elemento nulo, insere o novo elemento neste espaçoe quebra o laço;
		 */
		int i=0;// Índice do elemento no Array
		for(Solicitante elemento: listaSolicitante){
			if(elemento!=null){
				if(elemento.getId()==novoSolicitante.getId())
					break;
				else
					i++;
			}
			else{
				listaSolicitante[i]=novoSolicitante;
				break;
			}
		}
	}
	
	public void remover(long id){
		/*
		 * Caso qualquer elemento nulo seja encontrado, o laço é encerrado;
		 * Se o elemento com o ID especificado seja encontrado a posição dele é igualada à null;
		 * Caso o elemento tenha sido removido do vetor:
		 * 	 > Se o índice for a última posição, o espaço se torna null;
		 *   > Se não, o espaço atual é igualado ao próximo;
		 */
		boolean removido = false; // Varia de acordo com o sucesso do método
		int i=0;
		for(Solicitante elemento: listaSolicitante){
			if(elemento==null)break;
			if(elemento.getId() == id){
				elemento=null;
				removido=true;
			}
			if(removido){
				// Se índice for a última posição do vetor, é igualada à null, se não, ao próximo elemento
				listaSolicitante[i]=(i==listaSolicitante.length-1)?null:listaSolicitante[i+1];
			}
			i++;
		}
		if(removido){
			System.out.println("Solicitante removido com sucesso.");
		}
		else
			System.out.println("Solicitante não encontrado.");
	}
	
	public void alterar(long id, Solicitante novoSolicitante){
		boolean alterado = false; // Varia de acordo com o sucesso do método
		int i=0;
		for(Solicitante elemento: listaSolicitante){
			if(elemento==null)break;
			if(elemento.getId() == id){
				listaSolicitante[i]=novoSolicitante;
				alterado=true;
			}
			i++;
		}
		if(alterado)
			System.out.println("Solicitante alterado com sucesso.");
		else
			System.out.println("Solicitante não encontrado.");
	}
	
	public Solicitante buscar(long id){
		for(Solicitante solicitante : listaSolicitante){
			if(solicitante==null)break;
			if(solicitante.getId() == id){
				return solicitante;
			}
		}
		return null;
	}
	
	public Solicitante[] buscarTodos(){
		return this.getListaSolicitante();
	}
}