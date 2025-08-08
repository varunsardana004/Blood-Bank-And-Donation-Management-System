import java.util.*;

class DTSTraversal{
    LinkedList<Integer> adj[];
    boolean visited[];

    DFSTraversal(int v){
        adj[]=new LinkedList[v];
        visited[]=new boolean[v];

        for(int i=0;i<v;i++){
            adj[i]=new LinkedList<Integer>();

        }

        void insertEdge(int s,int d){
            adj[s].add[d];
        }

        void DFS(int vertex){
            visited[vertex]=true;
            System.out.println(vertex);

            Iterator<Integer> it=adj[vertex].listIterator();
            while(it.hasNext()){
                int n=it.Next();
                if(!visited[n])
                DFS(n);
            }
    
        }
    }


    
}