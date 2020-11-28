@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
<form role="form" method="post" action="{{ url('/service-master/addperformance') }}" id="analysis">
   @csrf
   <h3>Key Competencies</h3>
   
   <input type="hidden" name="ServiceId" id="ServiceId" value="{{$service}}">
   <input type="hidden" name="EngineerId" id="EngineerId" value="{{$engineer}}">
   
   <table border="1px">
      <tr>
         <td>
            <label><b>1.Customer Orientation-Business Generation</b></label>
            <p>Adequately identifies needs and push customers for purchase/repair of spare parts/components/consumables. Amicably communicates the message to-fro customer. Builds value for Individual and company.</p>
         </td>
         <td style="width: 30%">
            <input type="radio" name="QuestionOne" id="QuestionOne" onchange="total()" value="2">&nbsp<label>2</label>
            <input type="radio" name="QuestionOne" id="QuestionOne" onchange="total()" value="4">&nbsp<label>4</label>
            <input type="radio" name="QuestionOne" id="QuestionOne" onchange="total()" value="6">&nbsp<label>6</label>
            <input type="radio" name="QuestionOne" id="QuestionOne" onchange="total()" value="8">&nbsp<label>8</label>
            <input type="radio" name="QuestionOne" id="QuestionOne" onchange="total()" value="10">&nbsp<label>10</label>
         </td>
      </tr>
      <tr>
         <td>
            <label><b>2.Self-Learning Qualities</b></label>
            <p>Takes the lead when opportunities for learning are available. Provides analysis to customer to resolve the matter on site. Persuades and convinces on technical matters.</p>
         </td>
         <td>
            <input type="radio" name="QuestionTwo" id="QuestionTwo" onchange="total()" value="2">&nbsp<label>2</label>
            <input type="radio" name="QuestionTwo" id="QuestionTwo" onchange="total()" value="4">&nbsp<label>4</label>
            <input type="radio" name="QuestionTwo" id="QuestionTwo" onchange="total()" value="6">&nbsp<label>6</label>
            <input type="radio" name="QuestionTwo" id="QuestionTwo" onchange="total()" value="8">&nbsp<label>8</label>
            <input type="radio" name="QuestionTwo" id="QuestionTwo" onchange="total()" value="10">&nbsp<label>10</label>
         </td>
      </tr>
      <tr>
         <td>
            <label><b>3.Problem Solving Skills</b></label>
            <p>Takes lead while solving problem at site. Individually problem-solving skills and works an extra mile to solve at the earliest. Seeks win/win solutions whenever possible. Applies principles of consensus.</p>
         </td>
         <td>
            <input type="radio" name="QuestionThree" id="QuestionThree" onchange="total()" value="2">&nbsp<label>2</label>
            <input type="radio" name="QuestionThree" id="QuestionThree" onchange="total()" value="4">&nbsp<label>4</label>
            <input type="radio" name="QuestionThree" id="QuestionThree" onchange="total()" value="6">&nbsp<label>6</label>
            <input type="radio" name="QuestionThree" id="QuestionThree" onchange="total()" value="8">&nbsp<label>8</label>
            <input type="radio" name="QuestionThree" id="QuestionThree" onchange="total()" value="10">&nbsp<label>10</label>
         </td>
      </tr>
      <tr>
         <td>
            <label><b>4.Functional Knowledge</b></label>
            <p>Fulfills the functional requirements of the position through an appropriate mix of expertise, practical experience and past performance.</p>
         </td>
         <td>
            <input type="radio" name="QuestionFour" id="QuestionFour" onchange="total()" value="2">&nbsp<label>2</label>
            <input type="radio" name="QuestionFour" id="QuestionFour" onchange="total()" value="4">&nbsp<label>4</label>
            <input type="radio" name="QuestionFour" id="QuestionFour" onchange="total()" value="6">&nbsp<label>6</label>
            <input type="radio" name="QuestionFour" id="QuestionFour" onchange="total()" value="8">&nbsp<label>8</label>
            <input type="radio" name="QuestionFour" id="QuestionFour" onchange="total()" value="10">&nbsp<label>10</label>
         </td>
      </tr>
      <tr>
         <td>
            <label><b>5.Initiative & Drive</b></label>
            <p>Works pro-actively to do more than is required by an assignment, including time spent outside normal working hours when necessary.</p>
         </td>
         <td>
            <input type="radio" name="QuestionFive" id="QuestionFive" onchange="total()" value="2">&nbsp<label>2</label>
            <input type="radio" name="QuestionFive" id="QuestionFive" onchange="total()" value="4">&nbsp<label>4</label>
            <input type="radio" name="QuestionFive" id="QuestionFive" onchange="total()" value="6">&nbsp<label>6</label>
            <input type="radio" name="QuestionFive" id="QuestionFive" onchange="total()" value="8">&nbsp<label>8</label>
            <input type="radio" name="QuestionFive" id="QuestionFive" onchange="total()" value="10">&nbsp<label>10</label>
         </td>
      </tr>
      <tr>
         <td style="color: black;float: right;">
            <b>Total</b>
         </td>
         <td><input type="text" readonly name="Total_Marks" id="Total_Marks" style="width: 100%"></td>
         <td>
            
         </td>
      </tr>
   </table>
   <br>
   <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
</form>
