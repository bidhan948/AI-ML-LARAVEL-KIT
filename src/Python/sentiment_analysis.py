import sys
import time
import json
from transformers import pipeline

# Load the sentiment-analysis pipeline
nlp = pipeline("sentiment-analysis")

def analyze_sentiment(text):
    try:
        start_time = time.time()
        result = nlp(text)[0]
        end_time = time.time()
        result.update({
            "text": text,
            "processing_time": f"{end_time - start_time:.2f}s"
        })
        return json.dumps(result)
    except Exception as e:
        logging.error(f"Error processing text: {e}")
        return json.dumps({"error": str(e)})

if __name__ == '__main__':
    input_text = sys.argv[1]
    sentiment_result = analyze_sentiment(input_text)
    print(sentiment_result)
